@extends('layouts.default')
    
    @section('meta')
        <title>Edition Horaire | KKS-POINTAGE</title>
        <meta name="description" content="Workday edit employee schedule.">
    @endsection 

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Modifier Horaire') }}</h2>
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
                <form id="edit_schedule_form" action="{{ url('schedules/update') }}" class="ui form" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="field">
                        <label>{{ __('Employé') }}</label>
                        <input type="text" value="@isset($s->employee){{ $s->employee }}@endisset" name="employee" class="readonly" readonly="" />
                    </div>

                    <div class="two fields">
                        <div class="field">
                            <label for="">{{ __('Heure de début') }}</label>
                            <input type="text" placeholder="00:00 AM" name="intime" class="jtimepicker" value="@php if($tf == 1 && $s->intime != null) { echo e(date('H:i', strtotime($s->intime))); } else { echo e(date('H:i', strtotime($s->intime))); } @endphp"/>
                        </div>
                        <div class="field">
                            <label for="">{{ __('Heure de fin') }}</label>
                            <input type="text" placeholder="00:00 PM" name="outime" class="jtimepicker" value="@php if($tf == 1 && $s->outime != null) { echo e(date('H:i', strtotime($s->outime))); } else { echo e(date('H:i', strtotime($s->outime))); } @endphp"/>
                        </div>
                    </div>

                    <div class="field">
                        <label for="">{{ __('Du') }}</label>
                        <input type="text" placeholder="Date" name="datefrom" class="airdatepicker" value="@isset($s->datefrom){{ $s->datefrom }}@endisset"/>
                    </div>
                    <div class="field">
                        <label for="">{{ __('Au') }}</label>
                        <input type="text" placeholder="Date" name="dateto" class="airdatepicker" value="@isset($s->dateto){{ $s->dateto }}@endisset"/>
                    </div>

                    <div class="eight wide field">
                        <label for="">{{ __('Durée') }}</label>
                        <input type="text" placeholder="0" name="hours" value="@isset($s->hours){{ $s->hours }}@endisset"/>
                    </div>

                    <div class="grouped custom fields field">
                        <label>{{ __('Jours de repos') }}</label>
                        <div class="field">
                            <div class="ui checkbox sunday @isset($r) @if(in_array('Sunday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Dimanche" @isset($r) @if(in_array('Dimanche', $r) == true) checked @endif @endisset>
                                <label>{{ __('Dimanche') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox @isset($r) @if(in_array('Monday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Lundi" @isset($r) @if(in_array('Lundi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Lundi') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox @isset($r) @if(in_array('Tuesday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Mardi" @isset($r) @if(in_array('Mardi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Mardi') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox @isset($r) @if(in_array('Wednesday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Mercredi" @isset($r) @if(in_array('Mercredi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Mercredi') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox @isset($r) @if(in_array('Thursday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Jeudi" @isset($r) @if(in_array('Jeudi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Jeudi') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox @isset($r) @if(in_array('Friday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Vendredi" @isset($r) @if(in_array('Vendredi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Vendredi') }}</label>
                            </div>
                        </div>
                        <div class="field">
                            <div class="ui checkbox saturday @isset($r) @if(in_array('Saturday', $r) == true) checked @endif @endisset">
                                <input type="checkbox" name="restday[]" value="Samedi" @isset($r) @if(in_array('Samedi', $r) == true) checked @endif @endisset>
                                <label>{{ __('Samedi') }}</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>

                <div class="box-footer">
                    <input type="hidden" name="id" value="@isset($e_id){{ $e_id }}@endisset">
                    <button class="ui positive approve small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __('Enregistrer') }}</button>
                    <a href="{{ url('schedules') }}" class="ui black grey small button"><i class="ui times icon"></i> {{ __('Annuler') }}</a>
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('/assets/vendor/mdtimepicker/mdtimepicker.min.js') }}"></script>

    <script type="text/javascript">
        @isset($tf)
            @if($tf == 1)
                $('.jtimepicker').mdtimepicker({format:'h:mm tt', theme: 'blue', hourPadding: true});
            @else
                $('.jtimepicker').mdtimepicker({format:'hh:mm', theme: 'blue', hourPadding: true});
            @endif
        @endisset
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'yyyy-mm-dd' });
        $('.ui.dropdown.getid').dropdown({ onChange: function(value, text, $selectedItem) {
            $('select[name="employee"] option').each(function() {
                if($(this).val()==value) { var id = $(this).attr('data-id'); $('input[name="id"]').val(id); };
            });
        }});
    </script>
    @endsection