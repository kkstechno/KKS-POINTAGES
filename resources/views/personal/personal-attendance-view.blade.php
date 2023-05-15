@extends('layouts.personal')

    @section('meta')
        <title>Mes Pointages | KKS-Presence</title>
        <meta name="description" content="Workday my attendance, view all my attendances, and clock-in/out">
    @endsection

    @section('styles')
        <link href="{{ asset('/assets/vendor/air-datepicker/dist/css/datepicker.min.css') }}" rel="stylesheet">
    @endsection

    @section('content')
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="page-title">{{ __("Mes Pointages") }}</h2>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body reportstable">
                    <form action="" method="get" accept-charset="utf-8" class="ui small form form-filter" id="filterform">
                        @csrf
                        <div class="inline two fields">
                            <div class="three wide field">
                                <label>{{ __("Période") }}&nbsp;</label>
                                <input id="datefrom" type="text" name="" value="" placeholder="Date début" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>
                            <div class="two wide field">
                                <input id="dateto" type="text" name="" value="" placeholder="Date fin" class="airdatepicker">
                                <i class="ui icon calendar alternate outline calendar-icon"></i>
                            </div>
                            <button id="btnfilter" class="ui button positive small"><i class="ui icon filter alternate"></i> {{ __("Filtrer") }}</button>
                        </div>
                    </form>

                    <table width="100%" class="table table-bordered table-hover" id="dataTables-example" data-order='[[ 0, "desc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Date") }}</th>
                                <th>{{ __("Heure d'Arrivée") }}</th>
                                <th>{{ __("Heure de Fin") }}</th>
                                <th>{{ __("Durée") }}</th>
                                <th>{{ __("Statut") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($a)
                            @foreach ($a as $v)
                                <tr>

                                    <td>@php echo e(date('d-m-Y', strtotime($v->date))) @endphp</td>

                                    <td>
                                        @php
                                            if($v->timein != null) {
                                                if ($tf == 1) {
                                                    echo e(date('h:i:s', strtotime($v->timein)));
                                                } else {
                                                    echo e(date('H:i:s', strtotime($v->timein)));
                                                }
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            if($v->timeout != null) {
                                                if ($tf == 1) {
                                                    echo e(date('h:i:s', strtotime($v->timeout)));
                                                } else {
                                                    echo e(date('H:i:s', strtotime($v->timeout)));
                                                }
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @isset($v->totalhours)
                                        @if($v->totalhours != null) 
                                            @php
                                                if(stripos($v->totalhours, ".") === false) {
                                                    $h = $v->totalhours;
                                                } else {
                                                    $HM = explode('.', $v->totalhours); 
                                                    $h = $HM[0]; 
                                                    $m = $HM[1];
                                                }
                                            @endphp
                                        @endif
                                        @if($v->totalhours != null)
                                            @if(stripos($v->totalhours, ".") === false) 
                                                {{ $h }} H
                                            @else 
                                                {{ $h }} H {{ $m }} mn
                                            @endif
                                        @endif
                                    @endisset                                 
                                    </td>
                                    <td>
                                        @if($v->status_timein != '') 
                                        @if($v->status_timein == 'Late In')
                                            <span class="red">{{ __("Retard") }}</span> | 
                                        @else
                                            <span class="green">{{ __("A l'heure") }}</span> | 
                                        @endif
                                    @endif
                                    
                                    @if($v->status_timeout != '') 
                                        @if($v->status_timeout == 'Horaire respecté')
                                            <span class="blue">{{ __("Horaire respecté") }}</span> 
                                        @else
                                            <span class="orange">{{ __("Départ anticipé") }}</span> 
                                        @endif
                                    @endif
                                    </td>
                                </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>?
                </div>
            </div>
            </div>  
        </div>
    </div>

    @endsection
    
    @section('scripts')
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/datepicker.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/air-datepicker/dist/js/i18n/datepicker.fr.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment-timezone-with-data.js') }}"></script>

    <script type="text/javascript">
/*     $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true});
 */    $('.airdatepicker').datepicker({ language: 'fr', dateFormat: 'yyyy-mm-dd', autoClose: true });
    $('#filterform').submit(function(event) {
        event.preventDefault();
        var date_from = $('#datefrom').val();
        var date_to = $('#dateto').val();
        var url = $("#_url").val();

        $.ajax({
            url: url + '/get/personal/attendance/',type: 'get',dataType: 'json',data: {datefrom: date_from, dateto: date_to},headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
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
                        var in_status = employee[i].status_timein;
                        var out_status = employee[i].status_timeout;
                        
                        function t_in_status(in_status) {
                            if(in_status == 'Retard'){
                                return 'red';
                            } else {
                                return 'green';
                            }
                        }
                        
                        function t_out_status(out_status) {
                            if(out_status == 'Départ anticipé'){
                                return 'orange';
                            } else {
                                return 'blue';
                            }
                        }

                        function d_status(in_status, out_status) {
                            if(in_status != '' && out_status != '') {
                                return "<span class=' " + t_in_status(in_status) + "'>" +employee[i].status_timein+ "</span>" + ' / ' + "<span class='" + t_out_status(out_status) + "'>" +employee[i].status_timeout+ "</span>";
                            } else if (in_status != '' && out_status == '') {
                                return "<span class=' " + t_in_status(in_status) + "'>" +employee[i].status_timein+ "</span>";
                            } else {
                                return "";
                            }
                        }

                        var time_in = employee[i].timein;
                        var time_out = employee[i].timeout;
                        var t_in = moment(time_in, "YYYY-MM-DD hh:mm:ss A");
                        var t_out = moment(time_out, "YYYY-MM-DD hh:mm:ss A");
                        var format = {{ $tf }};

                        function tf(f) {
                            if(f == 1) {
                                return "hh:mm:ss A";
                            } else {
                                return "kk:mm:ss";
                            }
                        }

                        function time(p) {
                            if(p == 1) {
                                if(isNaN(t_in) !== true) {
                                    return t_in.format(tf(format));
                                } 
                            } else {
                                if(isNaN(t_out) !== true) {
                                    return t_out.format(tf(format));
                                }
                            }
                            return "";
                        }

                        function th(tt) {
                            if(tt !== null && tt.indexOf('.') !== -1) {
                                var t = tt.split(".");
                                return t[0]+" H "+t[1]+" mn";
                            }
                            
                            if(tt !== null && tt.indexOf('.') == 0) {
                                return tt+" hr";
                            }

                            return "";
                        }

                        tbody.append("<tr>"+ 
                                        "<td>"+employee[i].date+"</td>" + 
                                        "<td>"+time(1)+"</td>" + 
                                        "<td>"+time(2)+"</td>" + 
                                        "<td>"+th(employee[i].totalhours)+"</td>" + 
                                        "<td>"+d_status(in_status, out_status)+"</td>" + 
                                    "</tr>");
                    }

                    // initialize datatable
                    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: false,ordering: true, language: {
                        url: "https://cdn.datatables.net/plug-ins/1.11.5/i18n/fr-FR.json"
                    }});
                }            
            }
        })
    });
    </script>
    @endsection 