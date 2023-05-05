@extends('layouts.personal')
    @section('meta')
        <title>MAJ du mot de passe | KKS-Presence</title>
        <meta name="description" content="Workday update personal password">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Changer mot de passe utilisateur") }}</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-content">
                    @if ($errors->any())
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header">{{ __("Erreur de validation") }}</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form id="edit_personal_password_form" action="{{ url('personal/update/password') }}" class="ui form" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="field">
                            <label>{{ __("Mot de passe actuel") }}</label>
                            <input type="password" name="currentpassword" value="" placeholder="Enter Current Password">
                        </div>
                        <div class="field">
                            <label for="">{{ __("Nouveau Mot de passe") }}</label>
                            <input type="password" name="newpassword" value="" placeholder="Enter Password">
                        </div>
                        <div class="field">
                            <label for="">{{ __("Confirmer Mot de passe") }}</label>
                            <input type="password" name="confirmpassword" value="" placeholder="Enter Password Confirmation">
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
                            <button class="ui positive small button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Valider") }}</button>
                            <a class="ui grey small button" href="{{ url('personal/dashboard') }}"><i class="ui times icon"></i> {{ __("Annuler") }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
    