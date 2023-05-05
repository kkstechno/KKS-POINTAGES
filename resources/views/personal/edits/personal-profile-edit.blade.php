@extends('layouts.personal')

    @section('meta')
        <title>Edition Profil Employé | KKS-Presence</title>
        <meta name="description" content="Workday edit my information.">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("ÉDITION DU PROFIL") }}
                    <a href="{{ url('personal/profile/view') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Retour") }}</a>
                </h2>
            </div>    
        </div>
        <div class="col-md-12">
            @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">{{ __("Erreur de validation !") }}</div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="row">
            <form id="edit_personal_info_form" action="{{ url('personal/profile/update') }}" class="ui form custom" method="post" accept-charset="utf-8">
            @csrf
                <div class="col-md-12 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __("Renseignements personnels") }}</div>
                        <div class="box-body">
                            <div class="two fields">
                                 <div class="field">
                                        <label>{{ __("Nom") }}</label>
                                        <input type="text" class="uppercase" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset">
                                </div>
                                <div class="field">
                                    <label>{{ __("Prénoms") }}</label>
                                    <input type="text" class="uppercase" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset">
                                </div>
                            </div>
                            <div class="two fields">
                            <div class="field">
                                <label>{{ __("Genre") }}</label>
                                <select name="gender" class="ui dropdown uppercase">
                                    <option value="">--Choisir--</option>
                                    <option value="MALE" @isset($person_details->gender) @if($person_details->gender == 'MALE') selected @endif @endisset>Homme</option>
                                    <option value="FEMALE" @isset($person_details->gender) @if($person_details->gender == 'FEMALE') selected @endif @endisset>Femme</option>
                                </select>
                            </div>
                            <div class="field">
                            <label>{{ __('Situtation Matrimoniale') }}</label>
                                <select name="civilstatus" class="ui dropdown uppercase">
                                <option value="">--Choisir--</option>
                                    <option value="SINGLE" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'Célibataire') selected @endif @endisset>Célibataire</option>
                                    <option value="MARRIED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'Marié(e)') selected @endif @endisset>Marié(e)</option>
                                    <option value="WIDOWED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'Veuf(ve)') selected @endif @endisset>Veuf(ve)</option>
                                    <option value="LEGALLY SEPARATED" @isset($person_details->civilstatus) @if($person_details->civilstatus == 'Divorcé(e)') selected @endif @endisset>Divorcé(e)</option>
                                </select>
                            </div>
                            </div>
                            <div class="two fields">
                            <div class="field">
                                <label>{{ __("Email(Personel)") }}</label>
                                <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset"  class="lowercase">
                            </div>
                            <div class="field">
                                <label>{{ __("Contact") }}</label>
                                <input type="text" class="uppercase" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset">
                            </div>
                            </div>
                            <div class="field">
                                <label>{{ __("Adresse du domicile") }}</label>
                                <input type="text" class="uppercase" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset"  placeholder="Commune / Quartier ">    
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
                            <br>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 float-left">
                    <div class="action align-right">
                        <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i> {{ __("Update") }}</button>
                        <a href="{{ url('personal/dashboard') }}" class="ui grey small button cancel"><i class="ui times icon"></i> {{ __("Cancel") }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.en.js') }}"></script>
    <script type="text/javascript">
        $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'dd-mm-yyyy' });
    </script>
    @endsection