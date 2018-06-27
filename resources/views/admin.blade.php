<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

    
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script type="text/javascript">
        function date_time() {
        var date = new Date();
        var am_pm = "AM";
        var hour = date.getHours();
            if(hour>=12){
                am_pm = "PM";
            }
            if(hour>12){
                hour = hour - 12;
            }
            if(hour<10){
                hour = "0"+hour;
            }

            var minute = date.getMinutes();
            if (minute<10){
                minute = "0"+minute;
            }
            var sec = date.getSeconds();
            if(sec<10){
                sec = "0"+sec;
            }

        document.getElementById("time").innerHTML =  hour+":"+minute+":"+sec+" "+am_pm;
        }
        setInterval(date_time,500);
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background: #8CCDC2;">
            
                <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <span class="navbar-text" style="color: black">
                    <li class="time"><span class="date" id="time"></span> |
                        <?php
                          date_default_timezone_set('Asia/Manila');
                          echo date('l, F d, Y');
                        ?>
                    </li>
                </span>
            </ul>
        </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            @if(Auth::user()->role_id == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Welcome, {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/about"><i class="fas fa-info"></i>
                                            {{ __('About') }}
                                        </a>

                                        <a class="dropdown-item" href="blog"><i class="fas fa-pencil-alt"></i>
                                            {{ __('Blog Posts') }}
                                        </a>

                                        <a class="dropdown-item" href="admin/posts"><i class="fas fa-book-open"></i>
                                            {{ __('Manage Blog Posts') }}
                                        </a>

                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-user"></i>
                                            {{ __('My Profile') }}
                                        </a>


                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i>
                                            {{ __('Logout') }}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <main class="wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>    
    </main>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">My Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Name: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
        <p>Username: {{ Auth::user()->username }}</p>
        <p>Address: {{ Auth::user()->address }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <p>Contact Number: {{ Auth::user()->contact_number }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    <footer id="main-footer">
    <div class="fb media1">
        <a href="https://www.facebook.com/johnlouie.ymas"><i class="fab fa-facebook fa-2x"></i>johnlouie.ymas</a>
    </div>
    <div class="twt media1">
        <a href="https://twitter.com/johnlouieymas"><i class="fab fa-twitter fa-2x"></i>johnlouieymas</a>
    </div>
    <div class="inst media1">
        <a href="https://www.instagram.com/jlouieymas/"><i class="fab fa-instagram fa-2x"></i>jlouieymas</a>
    </div>
    <p>Copyright &copy; 2018 by John Louie M. Ymas</p>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


<script type="text/javascript" src="js/jquery.min.js"></script>


<script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>


<script type="text/javascript" src="js/script.js"></script>
</body>
</html>