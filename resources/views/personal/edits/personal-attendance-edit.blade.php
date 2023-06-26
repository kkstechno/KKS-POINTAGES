@extends('layouts.default')
    
    @section('meta')
        <title>Edition pointages | KKS-POINTAGES</title>
        <meta name="description" content="Workday edit employee attendance.">
    @endsection 

    @section('styles')
        <link href="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('AJOUTER UN POINTAGE') }}</h2>
            </div>    
        </div>

        <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-content">
                    @if ($errors->any())
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header">{{ __('Erreur de validation !') }}</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="edit_attendance_form" action="{{ url('attendance/update') }}" class="ui form" method="post" accept-charset="utf-8">
                    @csrf
                    @if($a->timeout != null)
                        <div class="two fields">
                            <div class="field">
                                <label>{{ __('Employé') }}</label>
                                <input type="text" name="employee" class="readonly" readonly="" value="@isset($a->employee){{ $a->employee }}@endisset">
                            </div>
                            <div class="field">
                                <label for="">{{ __('Date') }}</label>
                                <input class="readonly" type="text" placeholder="Date" name="date" value="@php echo e(date('d-m-Y', strtotime($a->date))) @endphp" readonly="" />
                            </div>
                        </div>
                    @else 
                        <div class="field">
                            <label>{{ __('Employé') }}</label>
                            <input type="text" name="employee" class="readonly" readonly="" value="@isset($a->employee){{ $a->employee }}@endisset">
                        </div>
                    @endif
                    
                    @if($a->timeout != null)
                        <div class="field">
                            <label for="">{{ __('Heure Arrivée') }}</label>
                            @isset($a->timein) 
                                @php 
                                    if($tf == 1) {
                                        $t_in = date("h:i:s",strtotime($a->timein)); 
                                    } else {    
                                        $t_in = date("H:i:s",strtotime($a->timein)); 
                                    }
                                    $t_in_date = date("d/m/Y",strtotime($a->timein)); 
                                @endphp
                            @endisset
                            <input type="hidden" name="timein_date" value="@isset($t_in_date){{ $t_in_date }}@endisset">
                            <input class="jtimepicker" type="text" placeholder="00:00:00" name="timein" value="@isset($t_in){{ $t_in }}@endisset"/>
                        </div>
                    @else
                        <div class="two fields">
                            <div class="field">
                                <label for="">{{ __('Heure Arrivée') }}</label>
                                @isset($a->timein) 
                                    @php 
                                        if ($tf == 1) {
                                            $t_in = date("h:i:s", strtotime($a->timein)); 
                                        } else {    
                                            $t_in = date("H:i:s", strtotime($a->timein)); 
                                        }
                                        $t_in_date = date("d/m/Y", strtotime($a->timein)); 
                                    @endphp
                                @endisset
                                <input type="hidden" name="timein_date" @if ($a->timein != NULL) readonly @endif value="{{ isset($t_in_date) ? $t_in_date : '' }}">
                                <input class="jtimepicker" type="text" placeholder="00:00:00" name="timein" value="@isset($t_in){{ $t_in }}@endisset">
                            </div>
                            
                            <div class="field">
                                <label for="">{{ __('Date Arrivée') }}</label>
                                <input class="readonly" type="text" placeholder="Date" name="date" value="@isset($a->date){{ $a->date }}@endisset" readonly/>
                            </div>
                        </div>
                    @endif
                    
                    @if($a->timeout != null)
                        <div class="field">
                            <label for="">{{ __('Heure Départ') }}</label>
                                @php 
                                    if($tf == 1) {
                                        $t_out = date("h:i:s",strtotime($a->timeout)); 
                                    } else {    
                                        $t_out = date("H:i:s",strtotime($a->timeout)); 
                                    }
                                    $t_out_date = date("d/m/Y",strtotime($a->timeout)); 
                                @endphp
                            <input type="hidden" name="timeout_date" value="@if($a->timeout != null){{ $t_out_date }}@endif">
                            <input class="jtimepicker" type="text" placeholder="00:00:00" name="timeout" value="@if($a->timeout != null){{ $t_out }}@endif"/>
                        </div>
                    @else
                        <div class="two fields">
                            <div class="field">
                                <label for="">{{ __('Heure Départ') }}</label>
                                @isset($a->timeout) 
                                    @php 
                                        if($tf == 1) {
                                            $t_out = date("h:i:s",strtotime($a->timeout)); 
                                        } else {    
                                            $t_out = date("H:i:s",strtotime($a->timeout)); 
                                        }
                                        $t_out_date = date("d/m/Y",strtotime($a->timeout)); 
                                    @endphp
                                @endisset
                                <input type="hidden" name="timeout_date" value="@if($a->timeout != null){{ $t_out_date }}@endif">
                                <input class="jtimepicker" type="text" placeholder="00:00:00" name="timeout" value="@if($a->timeout != null){{ $t_out }}@endif"/>
                            </div>
                            <div class="field">
                                <label for="">{{ __('Date Départ') }}</label>
                                <input type="text" name="timeout_date" value="" class="airdatepicker">
                            </div>
                        </div>
                    @endif

                    <div class="fields">
                        <div class="sixteen wide field">
                            <label>{{ __('Motif/Raison') }}</label>
                            <textarea class="" rows="5" name="reason">@isset($a->reason){{ $a->reason }}@endisset</textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui error message">
                            <i class="close icon"></i>
                            <div class="header"></div>
                            <ul class="list">
                                <li class=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="box-footer">
                    <input type="hidden" name="id" value="@isset($e_id){{ $e_id }}@endisset">
                    <input type="hidden" name="idno" value="@isset($a->idno){{ $a->idno }}@endisset">
                    <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Update') }}</button>
                    <a class="ui grey small button" href="{{ url('attendance') }}"><i class="ui times icon"></i> {{ __('Cancel') }}</a>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    
    <script type="text/javascript">
    @isset($tf)
        @if($tf == 1)
            $('.jtimepicker').mdtimepicker({format:'h:mm tt', theme: 'blue', hourPadding: true});
        @else
            $('.jtimepicker').mdtimepicker({format:'hh:mm', theme: 'blue', hourPadding: true});
        @endif
    @endisset
    $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });
    </script>
    @endsection