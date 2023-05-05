<?php

namespace App\Http\Controllers\personal;
use DB;
use App\Classes\table;
use App\Classes\permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonalDashboardController extends Controller
{
    public function index() 
    {
        $id = \Auth::user()->reference;
        $sm = date('Y/m/01');
        $em = date('Y/m/31');

        $cs = table::schedules()->where([
            ['reference', $id], 
            ['archive', '0'],
        ])->first();

        $ps = table::schedules()->where([
            ['reference', $id],
            ['archive', '1'],
        ])->take(8)->get();

        $tf = table::settings()->value("time_format");

        $al = table::leaves()->where([['reference', $id], ['status', 'Approuvé']])->count();
        $ald = table::leaves()->where([['reference', $id], ['status', 'Approuvé']])->take(8)->get();
        $pl = table::leaves()->where([['reference', $id], ['status', 'Refusé']])->orWhere([['reference', $id], ['status', 'En cours']])->count();
        $a = table::attendance()->where('reference', $id)->latest('date')->take(4)->get();

        $la = table::attendance()->where([['reference', $id], ['status_timein', 'Late In']])->whereBetween('date', [$sm, $em])->count();
        $it = table::attendance()->where([['reference', $id], ['status_timein', 'On time']])->whereBetween('date', [$sm, $em])->count();
        $ed = table::attendance()->where([['reference', $id], ['status_timeout', 'On time']])->whereBetween('date', [$sm, $em])->count();

        return view('personal.personal-dashboard', compact('cs', 'ps', 'al', 'pl', 'ald', 'a', 'la', 'it', 'tf'));
    }
}

