@extends('layouts.default')

    @section('meta')
        <title>SUPPRESSION EMPLOYE | KKS-POINTAGES</title>
        <meta name="description" content="Workday view employees, delete employees, edit employees, add employees">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="box box-success col-md-6">
            <div class="box-header with-border">{{ __('Suppression du compte Employé') }}</div>
                <div class="box-body">
                    <form action="{{ url('profile/delete/employee') }}" class="ui form" method="post" accept-charset="utf-8">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="@isset($id) {{$id}} @endisset">
                        <div class="field">
                            <div class="ui header" style="margin:0; text-align:center;">{{ __('Êtes-vous sûr de vouloir supprimer ceci ?') }}</div>
                        </div>
                        <div class="field">
                            <p>{{ __("La suppression de ce compte supprime également les données suivantes: présence du salarié, calendriers, congés, compte utilisateur ou tous les enregistrements associés à ce salarié.") }}</p>
                        </div>
                        <div class="field">
                            <a href="{{ url('employees') }}" class="ui black deny button">{{ __('NON') }}</a>
                            <button class="ui positive button approve" type="submit" name="submit"><i class="ui checkmark icon"></i>{{ __('OUI') }}</button>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>

    @endsection
