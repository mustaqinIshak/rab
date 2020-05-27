<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PT. ASU</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

    <!-- icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#sideMenuBar"
            aria-controls="#sideMenuBar" 
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="/barangs">PT. Asu</a>
    <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarContent"
            aria-controls="#navbarContent" 
            aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" 
                    href="#" id="navbarDropdown" 
                    role="button" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">
                    Name
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="wrapper d-flex">
    <div class="sideMenu" id="sideMenuBar">
        <div class="sidebar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="/rabs" class="nav-link">
                        <i class="material-icons">
                            unarchive
                        </i>
                        <span class="text">
                            List RAB
                        </span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/barangs" class="nav-link">
                        <i class="material-icons">
                            work
                        </i>
                        <span class="text">
                            List Barang
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col m-3">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
</html>