<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/img/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/img/favicon-32x32.png') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('/assets/images/img/KKS_l.png') }}">

        @yield('meta')

        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/semantic-ui/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/DataTables/datatables.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/flag-icon-css/css/flag-icon.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/style.css') }}">
        

        @yield('styles')
    </head>
    <body>

        <div class="wrapper">
        
        <nav id="sidebar" class="active">
            <div class="sidebar-header bg-lightblue" style="background-color:#E67E22;">
                <div class="logo">
                <a href="/" class="simple-text">
                    <img src="{{ asset('/assets/images/img/KKS_l.png') }}">
                    <img src="{{ asset('/assets/images/img/KKS.png') }}">
                </a>
                </div>
            </div>

            <ul class="list-unstyled components" >

                @if (in_array('1',Auth::user()->permissions()))
                 
                <li class="">
                    <a href="{{ url('dashboard') }}">
                        <i class="ui icon dashboard"></i>
                        <p>{{ __('Tableau de bord') }}</p>
                        <hr>
                    </a>
                </li>
                @endif
                @if (in_array('2', Auth::user()->permissions()) || in_array('21', Auth::user()->permissions()) || in_array('22', Auth::user()->permissions()) || in_array('23', Auth::user()->permissions()) || in_array('24', Auth::user()->permissions()) || in_array('25', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('employees') }}">
                        <i class="ui icon users"></i>
                        <p>{{ __('Employés') }}</p>
                    </a>
                </li>
                @endif                
                @if (in_array('11', Auth::user()->permissions()) || in_array('111', Auth::user()->permissions()) || in_array('112', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('fields/company') }}">
                        <i class="ui icon university"></i>
                        <p>{{ __('Entreprise') }}</p>
                    </a>
                </li>
                @endif 
                @if (in_array('12', Auth::user()->permissions()) || in_array('121', Auth::user()->permissions()) || in_array('122', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('fields/department') }}">
                        <i class="ui icon cubes"></i>
                        <p>{{ __('Department') }}</p>
                    </a>
                </li>
                @endif
                @if (in_array('13', Auth::user()->permissions()) || in_array('131', Auth::user()->permissions()) || in_array('132', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('fields/jobtitle') }}">
                        <i class="ui icon pencil alternate"></i>
                        <p>{{ __('Fonction') }}</p>
                        <hr>
                    </a>
                </li>
                @endif
                @if (in_array('3', Auth::user()->permissions()) || in_array('31', Auth::user()->permissions()) || in_array('32', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('attendance') }}">
                        <i class="ui icon clock outline"></i>
                        <p>{{ __('Pointages') }}</p>
                    </a>
                </li>
                @endif
                @if (in_array('4', Auth::user()->permissions()) || in_array('41', Auth::user()->permissions()) || in_array('42', Auth::user()->permissions()) || in_array('43', Auth::user()->permissions()) || in_array('44', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('schedules') }}">
                        <i class="ui icon calendar alternate outline"></i>
                        <p>{{ __('Horaires') }}</p>
                        <hr>
                    </a>
                </li>
                @endif
                @if (in_array('5', Auth::user()->permissions()) || in_array('51', Auth::user()->permissions()) || in_array('52', Auth::user()->permissions()) || in_array('53', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('leaves') }}">
                        <i class="ui icon calendar plus outline"></i>   
                        <p>{{ __('Demandes') }}</p>
                    </a>
                </li><hr>
                @endif
                @if (in_array('8', Auth::user()->permissions()) || in_array('81', Auth::user()->permissions()) || in_array('82', Auth::user()->permissions()) || in_array('83', Auth::user()->permissions()))
                <li class="">
                    <a href="{{ url('users') }}">
                        <i class="ui icon user circle outline"></i>
                        <p>{{ __('Utilisateurs') }}</p>
                        <hr>
                    </a>
                </li>
                @endif
                @if (in_array('7', Auth::user()->permissions())) 
                <li class="">
                    <a href="{{ url('reports') }}">
                        <i class="ui icon chart bar outline"></i>
                        <p>{{ __('Rapports') }}</p>
                    </a>
                </li>
                @endif
                @if (in_array('9', Auth::user()->permissions()) || in_array('91', Auth::user()->permissions())) 
                <li>
                    <a href="{{ url('settings') }}">
                        <i class="ui icon cog"></i>
                        <p>{{ __('Reglages') }}</p>
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-light bg-lightblue">
                <div class="container-fluid" style="background-color:#5D6D7E;">

                    <button type="button" id="slidesidebar" class="ui icon button btn-light-outline">
                        <i class="ui icon bars" style="color:white;"></i> <span class="toggle-sidebar-menu" style="color:white;">{{ __('Menu') }}</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto navmenu">
                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0" style="color:white;">
                                    <i class="ui icon linkify"></i> <span class="navmenutext uppercase">{{ __('Accès Rapide') }}</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                      <a href="{{ url('clock') }}" target="_blank" class="item"><i class="ui icon clock outline"></i>{{ __('Pointage') }}</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('employees/new') }}" class="item"><i class="ui icon user plus"></i>{{ __('Nouvel Employé') }}</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('fields/company') }}" class="item"><i class="ui icon university"></i>{{ __('Entreprise') }}</a>
                                      <a href="{{ url('fields/department') }}" class="item"><i class="ui icon cubes"></i>{{ __('Departement') }}</a>
                                      <a href="{{ url('fields/jobtitle') }}" class="item"><i class="ui icon pencil alternate"></i>{{ __('Fonction') }}</a>
                                    </div>
                              </div>
                            </li>
                            <li class="nav-item">
                               <div class="ui pointing link dropdown item" tabindex="0" style="color:white;">
                                    <i class="ui icon user outline"></i> <span class="navmenutext">@isset(Auth::user()->name){{ Auth::user()->name }}@endisset</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">    
                                      <a href="{{ url('update-profile') }}" class="item"><i class="ui icon user"></i>{{ __('MAJ du Compte') }}</a>
                                      <a href="{{ url('update-password') }}" class="item"><i class="ui icon lock"></i>{{ __('Changer Mdp') }}</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('logout') }}" class="item"><i class="ui icon power"></i>{{ __('Déconnexion') }}</a>
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>

            <input type="hidden" id="_url" value="{{url('/')}}">
            <script>
                var y = '@isset($var){{$var}}@endisset';
            </script>
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>
    @if ($success = Session::get('success'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'ui icon check',
                message: "{{ $success }}"},
                {type: 'success',timer: 400}
            );
        });
    </script>
    @endif
    
    @if ($error = Session::get('error'))
    <script>
        $(document).ready(function() {
            $.notify({
                icon: 'ui icon times',
                message: "{{ $error }}"},
                {type: 'danger',timer: 400});
        });
    </script>
    @endif

    @yield('scripts')

    </body>
</html>