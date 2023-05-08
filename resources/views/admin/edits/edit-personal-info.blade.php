@extends('layouts.default')
    
    @section('meta')
        <title>Edition Profil | KKS-POINTAGES</title>
        <meta name="description" content="Workday edit employee profile.">
    @endsection 

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Modifier information - Collaborateur') }}
                    <a href="{{ url('employees') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __('Return') }}</a>
                </h2>
            </div>    
        </div>

        <div class="col-md-12">
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
        </div>

        <div class="row">
            <form id="edit_employee_form" action="{{ url('profile/update') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __('Renseignements personnels') }}</div>
                        <div class="box-body">

                            <div class="field">
                                <label>{{ __('ID Employé') }}</label>
                                <input style="color:red;" type="text" class="uppercase" name="idno" value="@isset($company_details->idno){{ $company_details->idno }}@endisset" readonly>
                            </div>
                            <div class="two fields">
                                <div class="field">
                                    <label>{{ __('Prénom') }}</label>
                                    <input type="text" class="uppercase" name="firstname" value="@isset($person_details->firstname){{ $person_details->firstname }}@endisset">
                                </div>

                                  <div class="field">
                                <label>{{ __('Nom de Famille') }}</label>
                                <input type="text" class="uppercase" name="lastname" value="@isset($person_details->lastname){{ $person_details->lastname }}@endisset">
                                  </div>
                            </div>

                            <div class="field">
                                <label>{{ __('Genre') }}</label>
                                <select name="gender" class="ui dropdown uppercase">
                                    <option value="">Choisir Genre</option>
                                    <option value="Homme" @isset($person_details->gender) @if($person_details->gender == 'Homme') selected @endif @endisset>Homme</option>
                                    <option value="Femme" @isset($person_details->gender) @if($person_details->gender == 'Femme') selected @endif @endisset>Femme</option>
                                </select>
                            </div>
                            <div class="field">
                                 <label>{{ __('Situtation Matrimoniale') }}</label>
                                <select name="civilstatus" class="ui dropdown uppercase">
                                    <option value="">Choisir le statut</option>
                                    <option value="Célibataire">Célibataire</option>
                                    <option value="Comcubinage">En Couple</option>
                                    <option value="Marié">Marié(e)</option>                                
                                </select>
                            </div>
                            <div class="two fields">
                            <div class="field">
                                <label>{{ __('Email') }}</label>
                                <input type="email" name="emailaddress" value="@isset($person_details->emailaddress){{ $person_details->emailaddress }}@endisset" class="lowercase">
                            </div>
                            <div class="field">
                                <label>{{ __('Contact') }}</label>
                                <input type="text" class="uppercase" name="mobileno" value="@isset($person_details->mobileno){{ $person_details->mobileno }}@endisset">
                            </div>
                            </div>
                            <div class="field">
                                <label>{{ __('N° CNI') }}</label>
                                <input type="text" class="uppercase" name="nationalid" value="@isset($person_details->nationalid){{ $person_details->nationalid }}@endisset" placeholder="">
                            </div>
                            <div class="field">
                                <label>{{ __('Adresse du domicile') }}</label>
                                <input type="text" class="uppercase" name="homeaddress" value="@isset($person_details->homeaddress){{ $person_details->homeaddress }}@endisset" placeholder="">
                            </div>
                            <div class="field">
                                <label>{{ __('Photo de Profil') }}</label>
                                <input class="ui file upload" value="" id="imagefile" name="image" type="file" accept="image/png, image/jpeg, image/jpg" onchange="validateFile()">
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __('Détails de l\'employé') }}</div>
                        <div class="box-body">
                        <h4 class="ui dividing header">{{ __('Employeur') }}</h4>
                            <div class="field">
                            <label>{{ __('Entreprise') }}</label>
                                <select name="company" class="ui search dropdown uppercase">
                                <option value="">Choix Entreprise</option>
                                    @isset($company)
                                        @foreach ($company as $data)
                                            <option value="{{ $data->company }}" @if($data->company == $company_details->company) selected @endif> {{ $data->company }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="field">
                            <label>{{ __('Département') }}</label>
                                <select name="department" class="ui search dropdown uppercase department">
                                <option value="">Choix Département</option>
                                    @isset($department)
                                        @foreach ($department as $data)
                                            <option value="{{ $data->department }}" @if($data->department == $company_details->department) selected @endif> {{ $data->department }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="field">
                            <label>{{ __('Poste / Fonction') }}</label>
                                <div class="ui search dropdown selection uppercase jobposition">
                                    <input type="hidden" name="jobposition" value="{{$company_details->jobposition}}">
                                    <i class="dropdown icon"></i>
                                    <div class="text">{{$company_details->jobposition}}</div>
                                    <div class="menu">
                                    @isset($jobtitle)
                                        @isset($department)
                                            @foreach ($jobtitle as $data)
                                                @foreach ($department as $dept)
                                                    @if($dept->id == $data->dept_code)
                                                        <div class="item" data-value="{{ $data->jobtitle }}" data-dept="{{ $dept->department }}" @if($data->jobtitle == $company_details->jobposition) selected @endif>{{ $data->jobtitle }}</div>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endisset
                                    @endisset
                                    </div>
                                </div>
                            </div>
                            <h4 class="ui dividing header">{{ __('Information d\'emploi') }}</h4>
                            <div class="field">
                                <label>{{ __('Type d\'emploi ') }}</label>
                                <select name="employmenttype" class="ui dropdown uppercase">
                                    <option value="">Choisir Type</option>
                                    <option value="CDI" @isset($person_details->employmenttype) @if($person_details->employmenttype == 'CDI') selected @endif @endisset>CDI</option>
                                    <option value="CDD" @isset($person_details->employmenttype) @if($person_details->employmenttype == 'CDD') selected @endif @endisset>CDD</option>
                                    <option value="STAGE" @isset($person_details->employmenttype) @if($person_details->employmenttype == 'STAGE') selected @endif @endisset>STAGE</option>
                                </select>
                            </div>
                            <div class="field">
                                <label>{{ __('Date (Prise de fonction)') }}</label>
                                <input type="text" name="startdate" value="@isset($company_details->startdate){{ $company_details->startdate }}@endisset" class="airdatepicker" placeholder="Débuté le">
                            </div>
                            <div class="field">
                                <label>{{ __('Date d\'Embauche') }}</label>
                                <input type="text" name="dateregularized" value="@isset($company_details->dateregularized){{ $company_details->dateregularized }}@endisset" class="airdatepicker" placeholder="Embauché le">
                            </div>
                            <br>
                            <div class="field">
                                <label>{{ __('Statut') }}</label>
                                <select name="employmentstatus" class="ui dropdown uppercase">
                                    <option value="">Choisir Statut</option>
                                    <option value="Activé" @isset($person_details->employmentstatus) @if($person_details->employmentstatus == 'Activé') selected @endif @endisset>Activé</option>
                                    <option value="Archivé" @isset($person_details->employmentstatus) @if($person_details->employmentstatus == 'Archivé') selected @endif @endisset>Archivé</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header"></div>
                        <ul class="list">
                            <li class=""></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 float-left">
                    <div class="action align-right">
                        <input type="hidden" name="id" value="@isset($e_id){{ $e_id }}@endisset">
                        <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i> {{ __('Valider') }}</button>
                        <a href="{{ url('employees') }}" class="ui grey button small"><i class="ui times icon"></i> {{ __('Annuler') }}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @endsection

    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.fr.js') }}"></script>

    
    
    <script type="text/javascript">
        $('.airdatepicker').datepicker({ language: 'fr', dateFormat: 'yyyy-mm-dd', autoClose: true });

        $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
            $('.jobposition .menu .item').addClass('hide');
            $('.jobposition .text').text('');
            $('input[name="jobposition"]').val('');
            $('.jobposition .menu .item').each(function() {
                var dept = $(this).attr('data-dept');
                if(dept == value) {$(this).removeClass('hide');};
            });
        }});

        function validateFile() {
            var f = document.getElementById("imagefile").value;
            var d = f.lastIndexOf(".") + 1;
            var ext = f.substr(d, f.length).toLowerCase();
            if (ext == "jpg" || ext == "jpeg" || ext == "png") { } else {
                document.getElementById("imagefile").value="";
                $.notify({
                icon: 'ui icon times',
                message: "Veuillez télécharger uniquement les formats d'image jpg/jpeg et png."},
                {type: 'danger',timer: 400});
            }
        }

        var selected = "@isset($company_details->leaveprivilege){{ $company_details->leaveprivilege }}@endisset";
        var items = selected.split(',');
        $('.ui.dropdown.multiple.leaves').dropdown('set selected', items);
    </script>
    @endsection