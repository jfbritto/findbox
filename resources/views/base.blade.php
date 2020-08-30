<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Find Box</title>

        <link rel="icon" href="/img/ico.png">

        <meta name="theme-color" content="#1bb0be">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/all.min.css">
        <link rel="stylesheet" href="/css/estilo.css">
        

    </head>
    <body style="background-color:#1bb0be !important">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/home"><img id="animate" src="/img/logo.png" alt="" style="width: 120px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
            </ul>

            <a class="nav-link" href="#" id="sair" style="color:#f39322">Sair </a>

        </div>
        </nav>




        <div class="container-fluid mb-5" style="padding-top: 15px">

            @yield('body')
        
        </div>        

        <script src="/js/jquery-3.5.1.min.js" ></script>
        <script src="/js/bootstrap.bundle.min.js" ></script>
        <script src="/js/sweetalert.js"></script>
        <script src="/js/app.js"></script>
        <script src="/js/common.js"></script>
        @yield('js')
    </body>

</html>