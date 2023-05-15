<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/img/KKS_lg36X36.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/img/KKS_lg16X16.png') }}">
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

            <ul class="list-unstyled components">

                <li class="">
                    <a href="{{ url('personal/dashboard') }}">
                        <i class="ui icon dashboard"></i>
                        <p>{{ __("Tableau de Bord") }}</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/profile/view') }}">
                        <i class="ui icon user"></i>
                        <p>{{ __("PROFIL") }}</p>
                    </a>
                </li>
               <li class="">
                    <a href="{{ url('personal/attendance/view') }}">
                        <i class="ui icon clock outline"></i>
                        <p>{{ __("POINTAGES") }}</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/schedules/view') }}">
                        <i class="ui icon calendar alternate outline"></i>
                        <p>{{ __("HORAIRES") }}</p>
                    </a>
                </li>
                <li class="">
                    <a href="{{ url('personal/leaves/view') }}">
                        <i class="ui icon calendar plus outline"></i>
                        <p>{{ __("CONGES") }}</p>
                    </a>
                </li><br><hr>
                <li>
                    <a href="{{ url('personal/settings') }}">
                        <i class="ui icon sliders horizontal"></i>
                        <p>{{ __("A PROPOS") }}</p>
                    </a>
                </li>
            </ul>
        </nav>

        <div id="body" class="active">
            <nav class="navbar navbar-expand-lg navbar-light bg-lightblue">
                <div class="container-fluid" style="background-color:#5D6D7E;">

                    <button type="button" id="slidesidebar" class="ui icon button btn-light-outline">
                        <i class="ui icon bars" style="color:white;"></i> <span class="toggle-sidebar-menu" style="color:white;">{{ __('MENU') }}</span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto navmenu">
                            <li class="nav-item">
                                <div class="ui pointing link dropdown item" tabindex="0" style="color:white;">
                                    <i class="ui icon linkify"></i> <span class="navmenutext uppercase">{{ __("Accès Rapide") }}</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                      <a href="{{ url('clock') }}" target="_blank" class="item"><i class="ui icon clock outline"></i> {{ __("Pointage") }}</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('personal/profile/view') }}" class="item"><i class="ui icon user outline"></i> {{ __("Mon Profil") }}</a>
                                    </div>
                              </div>
                            </li>
                            <li class="nav-item">
                               <div class="ui pointing link dropdown item" tabindex="0" style="color:white;">
                                    <i class="ui icon user outline"></i><span class="navmenutext">@isset(Auth::user()->name) {{ Auth::user()->name }} @endisset</span>
                                    <i class="dropdown icon"></i>
                                    <div class="menu" tabindex="-1">
                                      <a href="{{ url('personal/update-user') }}" class="item"><i class="ui icon user"></i> {{ __("MAJ du Compte") }}</a>
                                      <a href="{{ url('personal/update-password') }}" class="item"><i class="ui icon lock"></i> {{ __("Modif. Mdp") }}</a>
                                      <div class="divider"></div>
                                      <a href="{{ url('logout') }}" class="item"><i class="ui icon power"></i> {{ __("Déconnexion") }}</a>
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
            $.notify({icon: 'ti-check',message: "{{ $success }}"},{type: 'success',timer: 600});
        });
    </script>
    @endif

    @if ($error = Session::get('error'))
    <script>
        $(document).ready(function() {
            $.notify({icon: 'ti-close',message: "{{ $error }}"},{type: 'danger',timer: 600});
        });
    </script>
    @endif

    @yield('scripts')

    </body>
</html>