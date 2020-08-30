<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/img/ico.png">

        <title>Find Box</title>

        <meta name="theme-color" content="#1a294a">

        <meta name="description" content="">
        <meta name="author" content="">
        <meta name=”keywords” content="" />
        <!-- <meta property="og:url" content="http://relatorios.micron.com.br/" /> -->
        <meta property="type" content="website" />
        <meta property="og:title" content="FIND BOX">
        <meta property="og:description" content="Encontre a caixa">
        <meta property="og:image" content="img/logo.png">
        <meta property="og:locale" content="pt_BR">
        <meta property="og:image:type" content="img/ico.png">
        <meta property="og:image:width" content="640">
        <meta property="og:image:height" content="480">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/bootstrap.min.css">

    </head>
    <body class="h-100" style="background-color: #1bb0be !important;">

        <div class="container-fluid h-100" style="padding-top: 100px">
            <div class="row h-100 mx-1">
                <div class="col-12 col-sm-4 offset-sm-4 bg-white my-auto rounded pt-3">
                    <form id="formAutenticar">
                        <div align="center" class="form-group">
                            <img id="animate" class="img-fluid" src="img/logo.png" alt="">
                        </div>
                        <div class="col-10 offset-1">
                            <div class="form-group">
                                <label for="">Login</label>
                                <input required type="text" id="login" class="form-control" maxlength="46">
                            </div>
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input required type="password" name="" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                <button style="background-color: #f39322; color: #fff" class="btn btn-lg btn-block">Entrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="/js/jquery-3.5.1.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>
        <script src="/js/sweetalert.js"></script>
        <script src="/js/login.js"></script>
    </body>

</html>
