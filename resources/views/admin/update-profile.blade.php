    @extends('layouts.default')

    @section('meta')
        <title>MAJ du Compte | KKS-POINTAGES</title>
        <meta name="description" content="Workday update your profile.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Mise à jour de compte") }}</h2>
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
                        <form action="{{ url('user/update-profile') }}" class="ui form" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="field">
                            <label>{{ __("Nom Complet") }}</label>
                            <input type="text" name="name" value="@isset($myuser->name){{ $myuser->name }}@endisset" class="uppercase">
                        </div>
                        <div class="field">
                            <label for="">{{ __("Email") }}</label>
                            <input type="email" name="email" value="@isset($myuser->email){{ $myuser->email }}@endisset" class="lowercase">
                        </div>
                        <div class="field">
                            <label for="">{{ __("Rôle") }}</label>
                        <input type="text" class="readonly uppercase" value="@isset($myrole){{ $myrole }}@endisset" readonly="" />
                        </div>
                        <div class="field">
                            <label for="">{{ __("Statut") }}</label>
                            <input type="text" class="readonly uppercase" value="@isset($myuser->status)@if($myuser->status == 1)Activé @else Désactivé @endif @endisset" readonly="" />
                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="ui positive button" type="submit" name="submit"><i class="ui checkmark icon"></i> {{ __("Mise à jour") }}</button>
                        <a class="ui grey button" href="{{ url('dashboard') }}"><i class="ui times icon"></i> {{ __("Annuler") }}</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
    