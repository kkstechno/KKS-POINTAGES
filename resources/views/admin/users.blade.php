@extends('layouts.default')

    @section('meta')
        <title>Utilisateurs | KKS-POINTAGES</title>
        <meta name="description" content="Workday users, view all users, add, edit, delete users">
    @endsection 

    @section('content')
    @include('admin.modals.modal-add-user')

    <div class="container-fluid">
        <div class="row">
            <h2 class="page-title">{{ __("LISTE DES UTILISATEURS") }}
            <button class="ui positive button mini offsettop5 btn-add float-right"><i class="ui icon plus"></i>{{ __("Ajouter Utilisateur") }}</button>
            <a href="{{ url('users/roles') }}" class="ui blue button mini offsettop5 float-right"><i class="ui icon user"></i>{{ __("Les Rôles") }}</a>
            </h2>
        </div>

        <div class="row">
            <div class="box box-success">
                <div class="box-body">
                    @if ($errors->any())
                    <div class="ui error message">
                        <i class="close icon"></i>
                        <div class="header">{{ __("Erreur de validation !") }}</div>
                        <ul class="list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <table width="100%" class="table table-striped table-hover" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Nom Complet") }}</th>
                                <th>{{ __("Email") }}</th>
                                <th>{{ __("Rôle") }}</th>
                                <th>{{ __("Type") }}</th>
                                <th>{{ __("Statut") }}</th>
                                <th>{{ __("Actions") }}</th>

                            </tr>
                        </thead>
                        <tbody>
                           @isset($users_roles)
                            @foreach ($users_roles as $val)
                            <tr>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->role_name }}</td>
                                <td> @if($val->acc_type == 2) Admin @else Employé @endif </td>
                                <td>
                                    <span style="color:Green;">
                                    @if($val->status == '1') 
                                    <span class="green">{{ __('Activé') }}</span>
                                        
                                    @else
                                    <span class="red">{{ __('Désactivé') }}</span>
                                    @endif
                                    </span>
                                </td>
                                <td class="align-right">
                                    <a href="{{ url('/users/edit/'.$val->id) }}" class="ui circular basic icon button tiny"><i class="icon edit outline"></i></a>
                                    <a href="{{ url('/users/delete/'.$val->id) }}" class="ui circular basic icon button tiny"><i class="icon trash alternate outline"></i></a>
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
    $('#dataTables-example').DataTable({responsive: true,pageLength: 15,lengthChange: false,searching: true,ordering: true});
    $('.ui.dropdown.getemail').dropdown({ onChange: function(value, text, $selectedItem) {
        $('select[name="name"] option').each(function() {
            if($(this).val()==value) {var e = $(this).attr('data-e');var r = $(this).attr('data-ref');$('input[name="email"]').val(e);$('input[name="ref"]').val(r);};
        });
    }});
    </script>
    @endsection