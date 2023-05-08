@extends('layouts.default')
    
    @section('meta')
        <title>Rapports Employés | KKS-POINTAGES</title>
        <meta name="description" content="Workday reports, view reports, and export or download reports">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("RAPPORT LISTE DES EMPLOYÉS") }}
                <a href="{{ url('export/report/employees') }}" class="ui basic button mini offsettop5 btn-export float-right"><i class="ui icon download"></i>{{ __("Exporter au format CSV") }}</a>
                <a href="{{ url('reports') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Return") }}</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Nom Employé") }}</th>
                                <th>{{ __("Genre") }}</th>
                                <th>{{ __("Situation matrimoniale") }}</th>
                                <th>{{ __("Contact") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Type Emploi") }}</th>
                                <th>{{ __("Statut") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($empList)
                                @foreach ($empList as $et)
                                    <tr>
                                        <td>{{ $et->lastname }} {{ $et->firstname }}</td>
                                        <td>{{ $et->gender }}</td>
                                        <td>{{ $et->civilstatus }}</td>
                                        <td>{{ $et->mobileno }}</td>
                                        <td>{{ $et->emailaddress }}</td>
                                        <td>{{ $et->employmenttype }}</td>
                                        <td>{{ $et->employmentstatus }}</td>
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