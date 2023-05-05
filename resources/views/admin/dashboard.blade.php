@extends('layouts.default')

    @section('meta')
        <title>Tableau de bord | KKS-POINTAGES</title>
        <meta name="description" content="Workday dashboard, view recent attendance, recent leaves of absence, and newest employees">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            
            <h2 class="page-title"><i class="ui icon dashboard"></i><span style="color:brown;">Admin |</span>{{ __(' TABLEAU DE BORD') }} </h2>
            </div><br>    
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ui icon user circle"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text uppercase" style="color:Red;">{{ __('Employés') }}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Hommes') }}</td>
                                            <td>@isset($emp_H) {{ $emp_H }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('Femmes') }}</td>
                                            <td>@isset($emp_F) {{ $emp_F }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ui icon clock outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text" style="color:Green;">{{ __('Pointages du jour')}}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Retard') }}</td>
                                            <td>@isset($emp_R) {{ $emp_R }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('A l\'heure') }}</td>
                                            <td>@isset($emp_A) {{ $emp_A }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="info-box">
                    <span class="info-box-icon bg-orange"><i class="ui icon calendar plus outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text uppercase" style="color:Orange;">{{ __('Congés Autorisés') }}</span>
                        <div class="progress-group">
                            <div class="progress sm">
                                <div class="progress-bar progress-bar-orange" style="width: 100%"></div>
                            </div>
                            <div class="stats_d">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td>{{ __('Approuvé') }}</td>
                                            <td>@isset($emp_leaves_approve) {{ $emp_leaves_approve }} @endisset</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('En attente') }}</td>
                                            <td>@isset($emp_leaves_pending) {{ $emp_leaves_pending }} @endisset</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><br><br><br>
    </div>
    <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Employés récents') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <table class="table responsive nobordertop">
                        <thead>
                            <tr>
                                <th class="text-left">{{ __('Nom') }}</th>
                                <th class="text-left">{{ __('Poste') }}</th>
                                <th class="text-left">{{ __('Prise de fonction') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($emp_all_type)
                                @foreach ($emp_all_type as $data)
                                <tr>
                                    <td class="text-left name-title">{{ $data->firstname }} {{ $data->lastname }}</td>
                                    <td class="text-left">{{ $data->jobposition }}</td>
                                    <td class="text-left">@php echo e(date('d/m/Y', strtotime($data->startdate))) @endphp</td>
                                </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Présences récentes') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <table class="table table-striped nobordertop">
                            <thead>
                                <tr>
                                    <th>{{ __("Date") }}</th>
                                    <th>{{ __("Arrivée") }}</th>
                                    <th>{{ __("Départ") }}</th>
                                    <th>{{ __("Durée") }}</th>
                                    <th>{{ __("Statut") }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($a)
                                @foreach ($a as $v)
                                    <tr>
                                        <td>
                                        @php echo e(date('d/m/Y', strtotime($v->date))); @endphp
                                        </td>
                                        <td>
                                            @php
                                                if($v->timein != null) {
                                                    if ($tf == 1) {
                                                        echo e(date('H:i:s', strtotime($v->timein)));
                                                    } else {
                                                        echo e(date('H:i:s', strtotime($v->timein)));
                                                    }
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                            @php
                                                if($v->timeout != null) {
                                                    if ($tf == 1) {
                                                        echo e(date('H:i:s', strtotime($v->timeout)));
                                                    } else {
                                                        echo e(date('H:i:s', strtotime($v->timeout)));
                                                    }
                                                }
                                            @endphp
                                        </td>
                                        <td>
                                        @isset($v->totalhours)
                                            @if($v->totalhours != null) 
                                                @php
                                                    if(stripos($v->totalhours, ".") === false) {
                                                        $h = $v->totalhours;
                                                    } else {
                                                        $HM = explode('.', $v->totalhours); 
                                                        $h = $HM[0]; 
                                                        $m = $HM[1];
                                                    }
                                                @endphp
                                            @endif
                                            @if($v->totalhours != null)
                                                @if(stripos($v->totalhours, ".") === false) 
                                                    {{ $h }} H
                                                @else 
                                                    {{ $h }} H {{ $m }} mn
                                                @endif
                                            @endif
                                        @endisset
                                        </td>
                                        <td>
                                            @if($v->status_timein != '' && $v->status_timeout != '') 
                                            <span class="@if($v->status_timein == 'Late In') red @else green @endif">{{ __("Retard") }}</span> |    
                                            <span class="@if($v->status_timeout == 'Horaire respecté') orange @else blue @endif">{{ __("Départ anticipé") }}</span> 
                                                 @elseif($v->status_timein == 'Late In') 
                                                 <span class="red">{{ __("Retard") }}</span>
                                                 @else 
                                                 <span class="green">{{ __("A l'heure") }}</span>
                                             @endif 
                                        </td>
                                    </tr>
                                @endforeach
                                @endisset   
                            </tbody>
                            </table>        
                    </div>
                    
                </div>
            </div>
        
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ __('Congés récents') }}</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                    <table class="table responsive nobordertop">
                        <thead>
                            <tr>
                                <th class="text-left">{{ __('Employé') }}</th>
                                <th class="text-left">{{ __('Date') }}</th>
                            </tr>
                        </thead>
                            <tbody>
                                @isset($emp_approved_leave)
                                    @foreach ($emp_approved_leave as $leaves)
                                    <tr>
                                        <td class="text-left name-title">{{ $leaves->employee }}</td>
          
                                        <td class="text-left">@php echo e(date('d/m/Y', strtotime($leaves->leavefrom))) @endphp</td>
                                    </tr>
                                    @endforeach
                                @endisset
                            </tbody>
                    </table>

                    </div>
                    
                </div>
            </div>
        </div>


    </div>
    @endsection
    

    
    
