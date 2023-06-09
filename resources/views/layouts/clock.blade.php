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
        
        <title>Employés | KKS-POINTAGES</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/vendor/semantic-ui/semantic.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/clock.css') }}">

        <script>
            function rappelPresence() {
              var popup = window.open("", "KKS-TECHNOLOGIES", "width=400,height=200");
              var message = "Veuillez pointer votre présence.";
        
              popup.document.write("<html><head><title>Rappel de présence</title></head><body>");
              popup.document.write("<h1>Rappel de présence</h1>");
              popup.document.write("<p>" + message + "</p>");
              popup.document.write("</body></html>");
            }
        
            // Appeler la fonction de rappel au chargement de la page
            window.onload = rappelPresence;
          </script>
        @yield('styles')
    </head>
    <body>

    <img src="{{ asset('/assets/images/img/fond05.jpg') }}" class="wave">
    <div class="wrapper">
        <div id="body">
            <div class="content">

                @yield('content')
             
            </div>
        </div>
    </div>

    <script src="{{ asset('/assets/vendor/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment.min.js') }}"></script>
    <script src="{{ asset('/assets/vendor/momentjs/moment-timezone-with-data.js') }}"></script>
    <script src="{{ asset('/assets/vendor/semantic-ui/semantic.min.js') }}"></script>
    <script src="{{ asset('/assets/js/script.js') }}"></script>

    <script>
        var timezone = "@isset($tz){{ $tz }}@endisset";
    </script>

    @yield('scripts')

    </body>
</html>