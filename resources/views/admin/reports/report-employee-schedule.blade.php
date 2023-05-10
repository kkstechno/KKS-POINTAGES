@extends('layouts.default')

    @section('meta')
        <title>Rapports | KKS-POINTAGES</title>
        <meta name="description" content="Workday reports, view reports, and export or download reports.">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("RAPPORT D'HORAIRE DE TRAVAIL DES EMPLOYÉS") }}
                <a href="{{ url('reports') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Retour") }}</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body reportstable">
                    <form action="{{ url('export/report/schedule') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="inline three fields" >
                            <div class="three wide field">
                                <select name="employee" class="ui search dropdown getid">
                                    <option value="">{{ __("Employé") }}</option>
                                    @isset($employee)
                                        @foreach($employee as $e)
                                            <option value="{{ $e->lastname }}, {{ $e->firstname }}" data-id="{{ $e->idno }}">{{ $e->lastname }}, {{ $e->firstname }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <input type="hidden" name="emp_id" value="">
                            <button id="btnfilter" class="ui icon button positive small inline-button"><i class="ui icon filter alternate"></i> {{ __("Filter") }}</button>
                            <button type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon download"></i> {{ __("Télécharger") }}</button>
                        </div>
                    </form>

                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Nom Employé") }}</th>
                                <th>{{ __("Heure Début ") }}</th>
                                <th>{{ __("Heure Fin") }}</th>
                                <th>{{ __("Du") }} </th>
                                <th>{{ __("Au") }}</th>
                                <th>{{ __("Durée") }}</th>
                                <th>{{ __("Jours de repos") }}</th>
                                <th>{{ __("Statut") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($empSched)
                            @foreach ($empSched as $v)
                                <tr>
                                    <td>{{ $v->employee }}</td>
                                    <td>
                                        @php
                                            if($v->intime != null) {
                                                if($tf == 1) {
                                                    echo e(date('h:i A', strtotime($v->intime)));
                                                } else {
                                                    echo e(date('H:i ', strtotime($v->intime)));
                                                }
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            if($v->outime != null) {
                                                if($tf == 1) {
                                                    echo e(date('h:i A', strtotime($v->outime)));
                                                } else {
                                                    echo e(date('H:i ', strtotime($v->outime)));
                                                }
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @php 
                                            echo e(date("d-m-Y", strtotime($v->datefrom)));
                                        @endphp 
                                    </td>
                                    <td>
                                        @php 
                                            echo e(date("d-m-Y", strtotime($v->dateto)));
                                        @endphp 
                                    </td>
                                    </td>
                                    <td>{{ $v->hours }}</td>
                                    <td>{{ $v->restday }}</td>
                                    <td>
                                        @if($v->archive == '0') 
                                            <span class="green">En cours</span>
                                        @else
                                            <span class="teal">Terminé</span>
                                        @endif
                                    </td>
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
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});

    // transfer idno 
    $('.ui.dropdown.getid').dropdown({ onChange: function(value, text, $selectedItem) {
        $('select[name="employee"] option').each(function() {
            if($(this).val()==value) {var id = $(this).attr('data-id');$('input[name="emp_id"]').val(id);};
        });
    }});

    $('#btnfilter').click(function(event) {
        event.preventDefault();
        var emp_id = $('input[name="emp_id"]').val();
        var date_from = $('#datefrom').val();
        var date_to = $('#dateto').val();
        var url = $("#_url").val();

        $.ajax({
            url: url + '/get/employee-schedules/',type: 'get',dataType: 'json',data: {id: emp_id},headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                showdata(response);
                function showdata(jsonresponse) {
                    var employee = jsonresponse;
                    var tbody = $('#dataTables-example tbody');
                    
                    // clear data and destroy datatable
                    $('#dataTables-example').DataTable().destroy();
                    tbody.children('tr').remove();

                    // append table row data
                    for (var i = 0; i < employee.length; i++) {
                        var datefrom = employee[i].datefrom;
                        var dateto = employee[i].dateto;
                        function f_date(format_date)
                        {
                            date = new Date(format_date);
                            year = date.getFullYear();
                            month = date.getMonth();
                            months = new Array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
                            d = date.getDate();
                            day = date.getDay();
                            days = new Array('Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi');
                            
                            n_date = days[day]+' '+months[month]+' '+d+', '+year;
                            return n_date; 
                        }

                        var a = employee[i].archive;
                        function s(a) {
                            if (a == '0') {
                                return '<span class="green">En cours</span>';
                            } else {
                                return '<span class="teal">Terminé</span>';
                            }
                        }

                        tbody.append("<tr>" + 
                                            "<td>"+employee[i].employee+"</td>" + 
                                            "<td>"+employee[i].intime+"</td>" + 
                                            "<td>"+employee[i].outime+"</td>" + 
                                            "<td>"+ f_date(datefrom) +"</td>" + 
                                            "<td>"+ f_date(dateto) +"</td>" + 
                                            "<td>"+employee[i].hours+"</td>" + 
                                            "<td>"+employee[i].restday+"</td>" + 
                                            "<td>"+ s(a) +"</td>" + 
                                    "</tr>");
                    }

                    // initialize datatable
                    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});
                }            
            }
        })
    });
    </script>
    @endsection 