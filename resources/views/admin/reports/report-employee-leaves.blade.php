@extends('layouts.default')
    
    @section('meta')
        <title>Rapports | KKS-POINTAGES</title>
        <meta name="description" content="Workday reports, view reports, and export or download reports">
    @endsection
    
    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("RAPPORT DES DEMANDES DE PERMISSION") }}
                <a href="{{ url('reports') }}" class="ui basic blue button mini offsettop5 float-right"><i class="ui icon chevron left"></i>{{ __("Retour") }}</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body reportstable">
                    <form action="{{ url('export/report/leaves') }}" method="post" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="inline three fields">
                            <div class="three wide field">
                                <select name="employee" class="ui search dropdown getid">
                                    <option value="">{{ __("Employé") }}</option>
                                    @isset($employee)
                                        @foreach($employee as $e)
                                            <option value="{{ $e->lastname }} {{ $e->firstname }}" data-id="{{ $e->idno }}">{{ $e->lastname }} {{ $e->firstname }}</option>
                                        @endforeach
                                    @endisset
                                </select>
                            </div>

                            <div class="two wide field">
                                <input id="datefrom" type="text" name="datefrom" value="" placeholder="Du" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>

                            <div class="two wide field">
                                <input id="dateto" type="text" name="dateto" value="" placeholder="Au" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>
                            <input type="hidden" name="emp_id" value="">
                            <button id="btnfilter" class="ui icon button positive small inline-button"><i class="ui icon filter alternate"></i> {{ __("Filter") }}</button>
                            <button type="submit" name="submit" class="ui icon button blue small inline-button"><i class="ui icon download"></i> {{ __("Télécharger") }}</button>
                        </div>
                    </form>
                    
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Soumis le") }}</th>
                                <th>{{ __("Nom Employé") }}</th>
                                <th>{{ __("Type de demande") }}</th>
                                <th>{{ __("Date Départ") }}</th>
                                <th>{{ __("Date Retour") }}</th>
                                <th>{{ __("Motif/Raison") }}</th>
                                <th>{{ __("Décision") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($empLeaves)
                            @foreach ($empLeaves as $v)
                                <tr>
                                    <td>@php echo e(date('d-m-Y', strtotime($v->leavefrom))) @endphp</td>
                                    <td>{{ $v->employee }}</td>
                                    <td>{{ $v->type }}</td>
                                    <td>@php echo e(date('d-m-Y', strtotime($v->leaveto))) @endphp</td>
                                    <td>@php echo e(date('d-m-Y', strtotime($v->returndate))) @endphp</td>
                                    <td>{{ $v->reason }}</td>
                                    <td>{{ $v->status }}</td>
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
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.fr.js') }}"></script>


    <script type="text/javascript">
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});
    $('.airdatepicker').datepicker({ language: 'fr', dateFormat: 'yyyy-mm-dd', autoClose: true });


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
            url: url + '/get/employee-leaves/',type: 'get',dataType: 'json',data: {id: emp_id, datefrom: date_from, dateto: date_to},headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
            success: function(response) {
                showdata(response);
                function showdata(jsonresponse) {
                    var leaves = jsonresponse;
                    var tbody = $('#dataTables-example tbody');
                    
                    // clear data and destroy datatable
                    $('#dataTables-example').DataTable().destroy();
                    tbody.children('tr').remove();

                    // append table row data
                    for (var i = 0; i < leaves.length; i++) {
                        tbody.append("<tr>"+ "<td>"+leaves[i].employee+"</td>" + "<td>"+leaves[i].type+"</td>" + "<td>"+leaves[i].leavefrom+"</td>" + "<td>"+leaves[i].leaveto+"</td>" + "<td>"+leaves[i].reason+"</td>" + "<td>"+leaves[i].status+"</td>" + "</tr>");
                    }

                    // initialize datatable
                    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});
                    
                }
            }
        })
    });
    </script>
    @endsection 