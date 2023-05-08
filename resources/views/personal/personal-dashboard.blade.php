@extends('layouts.personal')

@section('meta')
    <title>ESPACE EMPLOYE | KKS-POINTAGES</title>
    <meta name="description" content="KKS-POINTAGE mon tableau de bord, afficher les présences récentes, afficher les congés récents et afficher les horaires précédents">
@endsection

@section('content')

    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h2 class="page-title"><i class="ui icon dashboard"></i><span style="color:brown;">Collaborateurs |</span>{{ __(' TABLEAU DE BORD') }} </h2>        
        </div>    
    </div><br><br>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-white"><img src="{{ asset('/assets/images/img/4.jpg') }}" alt="Votre image" class="img-fluid"></span>
                <div class="info-box-content">
                    <span class="info-box-text"><span class="uppercase" style="color:Green;">{{ __("POINTAGE (MOIS EN COURS)") }}</span></span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-green" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("En retard") }}</td>
                                        <td><span class="bolder">@isset($la) {{ $la }} @endisset</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("A l'heure") }}</td>
                                        <td><span class="bolder">@isset($it) {{ $it }} @endisset</span></td>
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
                <span class="info-box-icon bg-white"><img src="{{ asset('/assets/images/img/5.jpg') }}" alt="Votre image" class="img-fluid"></span>
                <div class="info-box-content">
                    <span class="info-box-text" style="color:Red;">{{ __("HORAIRE DE TRAVAIL") }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("Début/Fin") }}</td>
                                        <td>
                                            <span class="bolder">
                                                @isset($cs)
                                                    @php
                                                    if ($cs->intime != null && $cs->outime != null) {
                                                        if ($tf == 1) {
                                                            echo e(date("h:i", strtotime($cs->intime)));
                                                            echo e(" - ");
                                                            echo e(date("h:i", strtotime($cs->outime)));
                                                        } else {
                                                            echo e(date("H:i", strtotime($cs->intime)));
                                                            echo e(" - ");
                                                            echo e(date("H:i", strtotime($cs->outime)));
                                                        }
                                                    }
                                                    @endphp
                                                @endisset
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("Jours Repos") }}</td>
                                        <td>
                                            <span class="bolder" style="color:red;">
                                                @isset($cs->restday) {{ $cs->restday }} @endisset
                                            </span>
                                        </td>
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
                <span class="info-box-icon bg-white"><img src="{{ asset('/assets/images/img/p4.jpg') }}" alt="Votre image" class="img-fluid"></span>
                <div class="info-box-content">
                    <span class="info-box-text uppercase" style="color:Orange;">{{ __("Permission") }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar progress-bar-orange" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("Approuvé") }} </td>
                                        <td><span class="bolder">@isset($al){{ $al }}@endisset</span></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("En attente") }} </td>
                                        <td><span class="bolder">@isset($pl){{ $pl }}@endisset</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><br><br><br>

    <div class="row">

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __("Pointages récents") }}</h3>
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

                                    @if($v->status_timein != '') 
                                        @if($v->status_timein == 'Late In')
                                            <span class="red">{{ __("Retard") }}</span> | 
                                        @else
                                            <span class="green">{{ __("A l'heure") }}</span> | 
                                        @endif
                                    @endif
                                    
                                    @if($v->status_timeout != '') 
                                        @if($v->status_timeout == 'Horaire respecté')
                                            <span class="blue">{{ __("Horaire respecté") }}</span> 
                                        @else
                                            <span class="orange">{{ __("Départ anticipé") }}</span> 
                                        @endif
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
                    <h3 class="box-title">{{ __("Horaires précédents") }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-striped nobordertop">
                    <thead>
                        <tr>
                            <th class="text-left">{{ __("Heure de Travail") }}</th>

                            <th class="text-left">{{ __("Période") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($ps)
                        @foreach($ps as $s)
                        <tr>
                            <td>
                                @php
                                    if ($s->intime != null && $s->outime != null) {
                                        if ($tf == 1) {
                                            echo e(date("h:i A", strtotime($s->intime)));
                                            echo e(" - ");
                                            echo e(date("h:i A", strtotime($s->outime)));
                                        } else {
                                            echo e(date("H:i", strtotime($s->intime)));
                                            echo e(" - ");
                                            echo e(date("H:i", strtotime($s->outime)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php 
                                    echo e(date('d-m-Y',strtotime($s->datefrom)).' | '.date('d-m-Y',strtotime($s->dateto)));
                                @endphp
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
                    <h3 class="box-title">{{ __("Permission/Congé Récents") }}</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                <table class="table table-striped nobordertop">
                    <thead>
                        <tr>
                            <th class="text-left">{{ __("Description") }}</th>
                            <th class="text-left">{{ __("Date") }}</th>
                        </tr>
                    </thead>
                        <tbody>
                            @isset($ald)
                            @foreach($ald as $l)
                            <tr>
                                <td>{{ $l->type }}</td>
                                <td>
                                    @php
                                        $fd = date('M', strtotime($l->leavefrom));
                                        $td = date('M', strtotime($l->leaveto));

                                        if($fd == $td){
                                            $var = date('d/m/Y', strtotime($l->leavefrom)) .' - '. date('d/m/Y', strtotime($l->leaveto));
                                        } else {
                                            $var = date('d/m/Y', strtotime($l->leavefrom)) .' - '. date('d/m/Y', strtotime($l->leaveto));
                                        }
                                    @endphp
                                    {{ $var }}
                                </td>
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
