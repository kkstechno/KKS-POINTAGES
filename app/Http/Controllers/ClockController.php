<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClockController extends Controller
{
    
    public function clock()
    {
        $data = table::settings()->where('id', 1)->first();
        $cc = $data->clock_comment;
        $tz = $data->timezone;
        $tf = $data->time_format;
        $rfid = $data->rfid;

        return view('clock', compact('cc', 'tz', 'tf', 'rfid'));
    }

    public function add(Request $request)
    {

        if ($request->idno == NULL || $request->type == NULL) 
        {
            return response()->json([
                "error" => trans(" Veuillez entrer votre ID.")
            ]);
        }

        if(strlen($request->idno) >= 20 || strlen($request->type) >= 20) 
        {
            return response()->json([
                "error" => trans("ID Employé invalide !")
            ]);
        }

        $idno = strtoupper($request->idno);
        $type = $request->type;
        $date = date('Y-m-d');
        $time = date('h:i:s A');
        $comment = strtoupper($request->clockin_comment);
        $ip = $request->ip();
        
        // clock-in comment feature
        $clock_comment = table::settings()->value('clock_comment');
        $tf = table::settings()->value('time_format');
        $time_val = ($tf == 1) ? $time : date("H:i:s", strtotime($time));
        $currentTime = date('H:i');
        
        if ($clock_comment == "on"  && $currentTime >= "08:31" && $currentTime <= "17:29") 
        {
            if ($comment == NULL)
            {
                return response()->json([
                    "error" => trans("Veuillez entrer une justification")
                ]);
            }
        }
        

        // ip resriction
        $iprestriction = table::settings()->value('iprestriction');

        if ($iprestriction != NULL) 
        {
            $ips = explode(",", $iprestriction);

            if(in_array($ip, $ips) == false) 
            {
                $msge = trans("Oups ! Vous n'êtes pas autorisé à pointer à l'arrivée ou à la sortie à partir de votre adresse IP")." ".$ip;
                return response()->json([
                    "error" => $msge,
                ]);
            }
        } 

        $employee_id = table::companydata()->where('idno', $idno)->value('reference');
        
        if($employee_id == null) {
            return response()->json([
                "error" => trans("Vous avez saisi un ID invalide !")
            ]);
        }

        $emp = table::people()->where('id', $employee_id)->first();
        $lastname = $emp->lastname;
        $firstname = $emp->firstname;
        $mi = $emp->mi;
        $employee = mb_strtoupper($lastname.' '.$firstname);

        if ($type == 'timein') 
        {
            $has = table::attendance()->where([['idno', $idno],['date', $date]])->exists();

            if ($has == 1) 
            {
                $hti = table::attendance()->where([['idno', $idno],['date', $date]])->value('timein');
                $hti = date('h:i A', strtotime($hti));
                $hti_24 = ($tf == 1) ? $hti : date("H:i", strtotime($hti)) ;

                return response()->json([
                    "employee" => $employee,
                    "error" => trans("Vous avez déjà marqué votre Arrivée aujourd'hui à")." ".$hti_24,
                ]);

            } else {
                $last_in_notimeout = table::attendance()->where([['idno', $idno],['timeout', NULL]])->count();

                if($last_in_notimeout >= 1)
                {
                    return response()->json([
                        "error" => trans("Veuillez marquer votre Départ de votre dernier pointage.")
                    ]);

                } else {

                    $sched_in_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('intime');
                    
                    if($sched_in_time == NULL)
                    {
                        $status_in = "Horaire non-defini";
                    } else {
                        $sched_clock_in_time_24h = date("H.i", strtotime($sched_in_time));
                        $time_in_24h = date("H.i", strtotime($time));

                        if ($time_in_24h <= $sched_clock_in_time_24h) 
                        {
                            $status_in = 'In Time';
                        } else {
                            $status_in = 'Late In';
                        }
                    }

                    if($clock_comment == "on" && $comment != NULL) 
                    {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                                'comment' => $comment,
                            ],
                        ]);
                    } else {
                        table::attendance()->insert([
                            [
                                'idno' => $idno,
                                'reference' => $employee_id,
                                'date' => $date,
                                'employee' => $employee,
                                'timein' => $date." ".$time,
                                'status_timein' => $status_in,
                            ],
                        ]);
                    }

                    return response()->json([
                        "type" => $type,
                        "time" => $time_val,
                        "date" => $date,
                        "lastname" => $lastname,
                        "firstname" => $firstname,
                        "mi" => $mi,
                    ]);
                }
            }
        }
  
        if ($type == 'timeout') 
        {
            $timeIN = table::attendance()->where([['idno', $idno], ['timeout', NULL]])->value('timein');
            $clockInDate = table::attendance()->where([['idno', $idno],['timeout', NULL]])->value('date');
            $hasout = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');
            $timeOUT = date("Y-m-d h:i:s A", strtotime($date." ".$time));

            if ($hasout != NULL) 
            {
                $hto = table::attendance()->where([['idno', $idno],['date', $date]])->value('timeout');
                $hto = date('h:i A', strtotime($hto));
                $hto_24 = ($tf == 1) ? $hto : date("H:i", strtotime($hto)) ;

                return response()->json([
                    "employee" => $employee,
                    "error" => trans("Vous avez déjà marqué votre Départ aujourd'hui à")." ".$hto_24,
                ]);

            }


            if($timeIN == NULL) 
            {
                return response()->json([
                    "error" => trans("Veuillez marquer votre Arrivée avant votre Départ !")
                ]);
            }else {
                $sched_out_time = table::schedules()->where([['idno', $idno], ['archive', 0]])->value('outime');
                
                if($sched_out_time == NULL) 
                {
                    $status_out = "Horaire non-defini";
                } else {
                    $sched_clock_out_time_24h = date("H.i", strtotime($sched_out_time));
                    $time_out_24h = date("H.i", strtotime($timeOUT));
                    
                    if($time_out_24h >= $sched_clock_out_time_24h) 
                    {
                        $status_out = 'On Time';
                    } else {
                        $status_out = 'Early Out';
                    }
                }

                $time1 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeIN); 
                $time2 = Carbon::createFromFormat("Y-m-d h:i:s A", $timeOUT); 
                $th = $time1->diffInHours($time2);
                $tm = floor(($time1->diffInMinutes($time2) - (60 * $th)));
                $totalhour = $th.".".$tm;

                table::attendance()->where([['idno', $idno],['date', $clockInDate]])->update(array(
                    'timeout' => $timeOUT,
                    'totalhours' => $totalhour,
                    'status_timeout' => $status_out)
                );
                
                return response()->json([
                    "type" => $type,
                    "time" => $time_val, 
                    "date" => $date,
                    "lastname" => $lastname,
                    "firstname" => $firstname,
                ]);
            }
        }
    }
}
