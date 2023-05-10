@extends('layouts.default')

    @section('meta')
        <title>Rapports | KKS-POINTAGES</title>
        <meta name="description" content="Workday reports, view reports, and export or download reports.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("RAPPORT DES COMPTES D'UTILISATEURS") }}
                <a href="{{ url('export/report/accounts') }}" class="ui basic button mini offsettop5 btn-export float-right"><i class="ui icon download"></i>{{ __("Exporter au format CSV") }}</a>
                <a href="{{ url('reports') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Retour") }}</a>
            </h2> 
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Nom Employé") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Type de compte") }}</th>
                                <th>{{ __("Statut") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($userAccs)
                                @foreach ($userAccs as $v)
                                    <tr>
                                        <td>{{ $v->name }}</td>
                                        <td>{{ $v->email }}</td>
                                        <td>@if( $v->acc_type == 2) Admin @else Employee @endif</td>
                                        <td>@if($v->status == 1) Activé @endif @if($v->status == 0) Désactivé @endif</td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @endsection
    
    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    </script>
    @endsection 