<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pint of Source tesztfeladat</title>

    <!-- Styles -->
    {{ HTML::style("css/app.css") }}

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <script src="{{ URL::asset('js/jquery-1.10.2.min.js') }}"></script>
</head>
<body>
   <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Pint of Source tesztfeladat
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul id="loggedin" class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">bejelentkezés</a></li>
                            <li><a href="{{ url('/register') }}">regisztráció</a></li>
                        @else
                            <li>
                                <a href="{{ url('/logout') }}">Kijelentkezés</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

       @if(Session::has("message"))
           <div class="alert-box alert" style="text-align: center;">{{ Session::get("message") }}</div>
       @endif

       <div id = "maincontent">

           @yield('content')
       </div><div class = "dt-spinner"></div>

    </div>

    <!-- Scripts -->
    <script>

        @section('script')
        @show

    </script>

</body>
</html>