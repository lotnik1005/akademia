
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Korepetycje</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://bootswatch.com/3/readable/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="css/app_index.css">
    <script>
        var base_url = '{{ url('/') }}';
    </script>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
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
                Korepetycje
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Logowanie</a></li>
                    <li><a href="{{ url('/register') }}">Rejestracja</a></li>
                @else
                    @if(Auth::user()->role_id == 3)
                        <li>
                            <a href="{{ url('/specializations') }}">Dodaj przedmiot</a>
                        </li>
                        <li>
                            <a href="{{ url('/films/create') }}">Dodaj film</a>
                        </li>
                    @endif
                    <li>
                        <a href="{{ url('/search') }}">Użytkownicy</a>
                    </li>
                    <li>
                        <a href="{{ url('/wall') }}">Tablica</a>
                    </li>
                    <li>
                        <a href="{{ url('/notifications') }}">Powiadomienia <?= Auth::user()->unreadNotifications->count() > 0 ? '<span class="label label-danger">' . Auth::user()->unreadNotifications->count() . '</span>' : '' ?></a>
                    </li>
                    <li>
                        <a href="{{ url('/users/' . Auth::id()) }}">{{ Auth::user()->name }}</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/users/' . Auth::id()) . '/edit' }}">Edytuj swój profil</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Wyloguj
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <div class="container">
        <h1>Akademia online</h1>
        <p>U nas znajdziesz najlepszych korepetytorów</p>
        <form action="./tutors/search" class="form-inline" method="GET">
            <div class="form-group">
                <label class="sr-only" for="subject">Przedmiot</label>
                <input name="subject" type="text" class="form-control autocomplete" id="subject" placeholder="Przedmiot">
            </div>

            <button type="submit" class="btn btn-warning">Szukaj</button>
            <!--<input type="hidden" name="view" value="subjectSearch">-->
        </form>

    </div>

</div>

@yield('content')

<footer>
    <p class="text-center">&copy; 2019 Poczynajło Grzegorz</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="js/app_index.js"></script>
</body>
</html>
