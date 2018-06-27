<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link -->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	
    <!-- Boostrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap/css/bootstrap.min.css">

    <!-- Scripts -->
    <script src="{{ asset('../js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" type="text/css"> --}}
    <link href="https://fonts.googleapis.com/css?family=Aldrich" rel="stylesheet" type="text/css"> 

    <!-- Styles -->
    <link href="{{ asset('../css/app.css') }}" rel="stylesheet">

</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">Pinoy Nostalgia</a>
			</div>
            <ul class="navbar-nav mr-auto">
                
            </ul>
			<ul class="navbar-nav ml-auto">
				{{-- <li class="nav-item active"><a class="nav-link" href="/">Home</a></li> --}}
				@guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                        
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    
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
                            
                @endguest
			</ul>

		</div>
	</nav>
	@yield('content')

</body>
</html>