@extends('layouts.default')

    @section('meta')
        <title>Nouvel Employé | KKS-POINTAGES</title>
        <meta name="description" content="Workday add new employee, delete employee, edit employee">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __('Ajouter nouvel employé') }}</h2>
            </div>    
        </div>

        <div class="row">
            <div class="col-md-12">
            @if ($errors->any())
            <div class="ui error message">
                <i class="close icon"></i>
                <div class="header">{{ __('Erreur de Validation') }}</div>
                <ul class="list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            </div>
            <form id="add_employee_form" action="{{ url('employee/add') }}" class="ui form custom" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            @csrf
                <div class="col-md-6 float-left">
                    <div class="box box-success">
                        <div class="box-header with-border">{{ __('Renseignements personnels') }}</div>
                        <div class="box-body">
                            <div class="two fields">
                                <div class="field">
                                    <label>{{ __('Nom de Famille') }}</label>
                                    <input type="text" class="uppercase" name="lastname" value="">
                                </div>
                                <div class="field">
                                    <label>{{ __('Prénom') }}</label>
                                    <input type="text" class="uppercase" name="firstname" value="">
                                </div>
                            </div>

                            <div class="field">
                                <label>{{ __('Genre') }}</label>
                                <select name="gender" class="ui dropdown uppercase">
                                    <option value="">Choisir Genre</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Femme">Femme</option>
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
                                <input type="email" name="emailaddress" value="" class="lowercase">
                            </div>
                            <div class="field">
                                <label>{{ __('Contact') }}</label>
                                <input type="text" class="" name="mobileno" value="">
                            </div>
                            </div>

                            <div class="field">
                                <label>{{ __('N° CNI') }}</label>
                                <input type="text" class="uppercase" name="nationalid" value="" placeholder="Numéro de la carte CNI">
                            </div>
                            <div class="field">
                                <label>{{ __('Adresse du domicile') }}</label>
                                <input type="text" class="uppercase" name="homeaddress" value="" placeholder="Commune / Quartier ">
                            </div><br><br>
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
                                    <option value="{{ $data->company }}"> {{ $data->company }}</option>
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
                                    <option value="{{ $data->department }}"> {{ $data->department }}</option>
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                            <div class="field">
                                <label>{{ __('Poste / Fonction') }}</label>
                                <div class="ui search dropdown selection uppercase jobposition">
                                    <input type="hidden" name="jobposition">
                                    <i class="dropdown icon" tabindex="1"></i>
                                    <div class="default text">Sélectionner Poste</div>
                                    <div class="menu">
                                        @isset($jobtitle)
                                        @isset($department)
                                        @foreach ($jobtitle as $data)
                                        @foreach ($department as $dept)
                                        @if($dept->id == $data->dept_code)
                                        <div class="item" data-value="{{ $data->jobtitle }}" data-dept="{{ $dept->department }}">{{ $data->jobtitle }}</div>
                                        @endif
                                        @endforeach
                                        @endforeach
                                        @endisset
                                        @endisset
                                    </div><br>  
                                </div>
                                <h4 class="ui dividing header">{{ __('Information d\'emploi') }}</h4>

                            </div>

                            <div class="field">
                                <label>{{ __('Date (Prise de fonction)') }}</label>
                                <input type="text" name="startdate" value="" class="airdatepicker uppercase" data-position="top right" placeholder="Date">
                            </div>
                            <div class="field">
                                <label>{{ __('Date d\'Embauche') }}</label>
                                <input type="text" name="dateregularized" value="" class="airdatepicker uppercase" data-position="top right" placeholder="Date">
                            </div>

                            <div class="field">
                                <label>{{ __('Type d\'emploi ') }}</label>
                                <select name="employmenttype" class="ui dropdown uppercase">
                                    <option value="">Choisir Type</option>
                                    <option value="CDI">CDI</option>
                                    <option value="CDD">CDD</option>
                                    <option value="STAGE">STAGE</option>

                                </select>
                            </div>
                            <div class="field">
                                <label>{{ __(' Statut') }}</label>
                                <select name="employmentstatus" class="ui dropdown uppercase">
                                    <option value="">Choisir Statut</option>
                                    <option value="Activé">Activé</option>
                                    <option value="Archivé">Archivé</option>
                                </select>
                            </div>
                            <br>
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
                        <button type="submit" name="submit" class="ui green button small"><i class="ui checkmark icon"></i>{{ __('Valider') }}</button>
                        <a href="{{ url('employees') }}" class="ui grey button small"><i class="ui times icon"></i>{{ __('Annuler') }}</a>
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

   $('.airdatepicker').datepicker({ language: 'en', dateFormat: 'dd-mm-yyyy', autoClose: true });

    
    $('.ui.dropdown.department').dropdown({ onChange: function(value, text, $selectedItem) {
        $('.jobposition .menu .item').addClass('hide disabled');
        $('.jobposition .text').text('');
        $('input[name="jobposition"]').val('');
        $('.jobposition .menu .item').each(function() {
            var dept = $(this).attr('data-dept');
            if(dept == value) {$(this).removeClass('hide disabled');};
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
    </script>
    @endsection