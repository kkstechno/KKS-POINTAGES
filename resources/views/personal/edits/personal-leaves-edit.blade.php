@extends('layouts.personal')

    @section('meta')
        <title>Edition Demandes | KKS-POINTAGES</title>
        <meta name="description" content="Workday edit pending leave of absence.">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("MODIFIER LA DEMANDE") }}</h2>
        </div>
        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                <form id="edit_request_personal_leave_form" action="{{ url('personal/leaves/update') }}" class="ui form" method="post" accept-charset="utf-8">
                    @csrf
                    <div class="field">
                            <label>{{ __("Type de congés") }}</label>
                            <select name="type" class="ui dropdown uppercase">
                                <option value="">Choisir type</option>
                                <option value="Conge">Demande de congé</option>
                                <option value="Permission">Permission d'absence</option>
                            </select>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label for="">{{ __("Date de soumission") }}</label>
                            <input id="leavefrom" type="text" placeholder="Date" name="leavefrom" class="airdatepicker" value="@isset($l->leavefrom){{ $l->leavefrom }}@endisset"/>
                        </div>
                        <div class="field">
                            <label for="">{{ __("Date Départ") }}</label>
                            <input id="leaveto" type="text" placeholder="Date" name="leaveto" class="airdatepicker" value="@isset($l->leaveto){{ $l->leaveto }}@endisset"/>
                        </div>
                    </div>
                    <div class="field">
                        <label for="">{{ __("Date Retour") }}</label>
                        <input id="returndate" type="text" placeholder="" name="returndate" class="airdatepicker uppercase" value="@isset($l->returndate){{ $l->returndate }}@endisset"/>
                    </div>
                    <div class="field">
                        <label>{{ __("Motifs/Raisons") }}</label>
                        <textarea class="uppercase" rows="5" name="reason" value="@isset($l->reason){{ $l->reason }}@endisset">@isset($l->reason){{ $l->reason }}@endisset</textarea>
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
                    <div class="actions">
                        <input type="hidden" name="id" value="@isset($e_id){{ $e_id }}@endisset">
                        <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Mise à jour") }}</button>
                        <a href="{{ url('personal/leaves/view') }}" class="ui grey small button cancel"><i class="ui times icon"></i> {{ __("Annuler") }}</a>
                    </div>
                </form>  
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.fr.js') }}"></script>
    <script type="text/javascript">

       $('.airdatepicker').datepicker({ language: 'fr', dateFormat: 'yyyy-mm-dd', autoClose: true });

    </script>
    @endsection


