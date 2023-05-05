@extends('layouts.default')

    @section('meta')
        <title>Types de Congé | KKS-POINTAGES</title>
        <meta name="description" content="Workday leave type, view leave types, add or edit leave types and export or download leave types.">
    @endsection

    @section('content')
    @include('admin.modals.modal-import-leavetypes')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title uppercase">{{ __("AJOUTER DES TYPES DE CONGÉS") }}
                    <a href="{{ url('fields/leavetype/leave-groups') }}" class="ui primary mini button offsettop5 float-right"><i class="icon calendar check outline"></i>{{ __("Groupe de Congé") }}</a>
                    <button class="ui basic button mini offsettop5 btn-import float-right"><i class="ui icon upload"></i>{{ __("Importer") }}</button>
                    <a href="{{ url('export/fields/leavetypes' )}}" class="ui basic button mini offsettop5 btm-export float-right"><i class="ui icon download"></i>{{ __("Exporter") }}</a>
                </h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box box-success">
                    <div class="box-body">
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
                        <form id="add_leavetype_form" action="{{ url('fields/leavetype/add') }}" class="ui form" method="post" accept-charset="utf-8">
                            @csrf
                            <div class="field">
                                <label>{{ __("Intitulé") }} <span class="help">(ex: "Congé de maternité")</span></label>
                                <input class="uppercase" name="leavetype" value="" type="text">
                            </div>
                            <div class="field">
                                <label>{{ __("Nombre de jours") }} <span class="help">(ex: "15")</span></label>
                                <input class="" name="credits" value="" type="text">
                            </div>
                            <div class="grouped fields opt-radio">
                                <label class="">{{ __("Périodicité") }}</label>
                                <div class="field">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="term" value="Mensuelle" checked="checked">
                                        <label>{{ __("Mensuel") }}</label>
                                    </div>
                                </div>
                                <div class="field" style="padding:0px!important">
                                    <div class="ui radio checkbox">
                                        <input type="radio" name="term" value="Annuelle">
                                        <label>{{ __("Annuel") }}</label>
                                    </div>
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
                            <div class="actions">
                                <button type="submit" class="ui positive button small"><i class="ui icon check"></i> {{ __("Valider") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="box box-success">
                    <div class="box-body">
                        <table width="100%" class="table table-striped table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>{{ __("Intitulé") }}</th>
                                    <th>{{ __("Jours Accordés") }}</th>
                                    <th>{{ __("Périodicité") }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($data)
                                @foreach ($data as $leavetype)
                                <tr>
                                    <td>{{ $leavetype->leavetype }}</td>
                                    <td>{{ $leavetype->limit }}</td>
                                    <td>{{ $leavetype->percalendar }}</td>
                                    <td class="align-right"><a href="{{ url('fields/leavetype/delete/'.$leavetype->id) }}" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a></td>
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

    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});

    function validateFile() {
        var f = document.getElementById("csvfile").value;
        var d = f.lastIndexOf(".") + 1;
        var ext = f.substr(d, f.length).toLowerCase();
        if (ext == "csv") {} else {
            document.getElementById("csvfile").value = "";
            $.notify({
                icon: 'ui icon times',
                message: "Veuillez télécharger uniquement le format de fichier CSV."
            }, {
                type: 'danger',
                timer: 400
            });
        }
    }
    </script>
    @endsection