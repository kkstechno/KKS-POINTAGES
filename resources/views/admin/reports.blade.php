@extends('layouts.default')
    @section('meta')
        <title>Rapports | KKS-POINTAGES</title>
        <meta name="description" content="Workday reports, view reports, and export or download reports.">
    @endsection 

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __('Rapports') }}</h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                <table width="100%" class="reports-table table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                    <thead>
                        <tr>
                            <th>{{ __('Intitulé du rapport') }}</th>
                            <th class="odd">{{ __('Dernière vue') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{ url('reports/employee-list') }}"><i class="ui icon users"></i> {{ __('Rapport listing des Employés') }}</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                    @foreach ($lastviews as $views)
                                        @if($views->report_id == 1)
                                        
                                            {{ $views->last_viewed }}
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-attendance') }}"><i class="ui icon clock"></i> {{ __(' Rapport de présence des employés') }}</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                    @foreach ($lastviews as $views)
                                        @if($views->report_id == 2)
                                            {{ $views->last_viewed }}
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-leaves') }}"><i class="ui icon calendar plus"></i> {{ __('Rapport des demandes de permission des employés') }}</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                    @foreach ($lastviews as $views)
                                        @if($views->report_id == 3)
                                            {{ $views->last_viewed }}
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/employee-schedule') }}"><i class="ui icon calendar alternate outline"></i> {{ __('Rapport d\'horaire des employés') }}</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                    @foreach ($lastviews as $views)
                                        @if($views->report_id == 4)
                                            {{ $views->last_viewed }}
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                        <tr>
                            <td><a href="{{ url('reports/user-accounts') }}"><i class="ui icon address book outline"></i> {{ __('Rapport des comptes d\'utilisateurs') }}</a></td>
                            <td class="odd">
                                @isset($lastviews)
                                    @foreach ($lastviews as $views)
                                        @if($views->report_id == 6)
                                            {{ $views->last_viewed }}
                                        @endif
                                    @endforeach
                                @endisset
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});
    </script>
    @endsection 