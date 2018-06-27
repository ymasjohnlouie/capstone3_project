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
                        @if(Auth::user()->role_id != 1)
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Welcome, {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="about"><i class="fas fa-info"></i>
                                        {{ __('About') }}
                                    </a>

                                    <a class="dropdown-item" href="blog"><i class="fas fa-pencil-alt"></i>
                                        {{ __('Blog Posts') }}
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
                            @else
                            @if(Auth::user()->role_id == 1)
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Welcome, {{ Auth::user()->username }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                        <a class="dropdown-item" href="/about">
                                            {{ __('About') }}
                                        </a>

                                        <a class="dropdown-item" href="/blog">
                                            {{ __('Blog Posts') }}
                                        </a>

                                        <a class="dropdown-item" href="/admin/posts">
                                            {{ __('Manage Blog Posts') }}
                                        </a>

                                        <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                            {{ __('My Profile') }}
                                        </a>


                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endif
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
    
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        {{ $error }}
        </div>
        @endforeach
    @endif

    <div class="col-md-10 offset-md-1">
    <h1>Edit Post</h1>

    
    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <label class="control-label col-sm-2" for="title">Title:</label>
            <div class="col-sm-10">
                <input type="title" class="form-control" id="title" name="title" placeholder="Item Name" value="{{ $post->title }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="content">Content:</label>
            <div class="col-sm-10"> 
                <textarea class="form-control" id="content" name="content" placeholder="Item Content">{{ $post->content }}</textarea>
            </div>
        </div>
        <div class="form-group">
                <label class="control-label col-sm-2" for="category">Category:</label>
                <div class="col-sm-10">
                <select class="form-control" name="category" id="category">
                    @foreach(\App\postsCategory::all() as $category)
                    <option value='{{$category->id}}'
                        @if($category->id == $post->category_id) {{ "selected" }}
                        @endif>
                        {{$category->category}}
                    </option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="image">Upload Image:</label>
                <div class="col-sm-10">
                    <input type="file" name="image" class="form-control">
                    <br>
                    <img src="/{{$post->image}}" style="height: 100px;">
                </div>
            </div>

        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

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
</body>
</html>