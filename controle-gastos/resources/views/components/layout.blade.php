<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} - Controle de Gastos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" /> 
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #6F8F72;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#" style="color: #FFFFFF">Controle de gastos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    
                <ul class="navbar-nav">
                    @if(session('user'))

                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF" href="{{ route('receitas')}}">Receitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF" href="{{ route('register')}}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF"  href="{{ route('logout') }}">Logout</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" style="color: #FFFFFF" href="{{ route('login') }}">Login</a>
                    </li>
                    @endif
                </ul>
                
            </div>
        </div>
    </nav>
    @yield('body')
</body>
</html>