<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url('icons/logo.png') ?>" type="image/x-icon"/>
        <title>Tale of Valhalla | ADMIN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/bootstrap/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/adminlte.min.css') ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/skins/skin-black.min.css') ?>">
        <!-- Materialize -->
        <link rel="stylesheet" href="<?= base_url('assets/plugins/materialize/css/materialize.min.css') ?>">
        <!-- Tale of Valhalla CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/tale-of-valhalla.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="login-body">

        <div class="row center-row">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="card horizontal login-card">
                    <div class="card-content logo-card bg-gray">
                        <img src="<?= base_url('icons/logo.png') ?>" class="logo-login">
                        <p class="panel-title tittle">Tale</p>
                        <p class="panel-title tittle">of</p>
                        <p class="panel-title tittle">Valhalla</p>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content bg-black-gradient">
                            <p class="login-header">BEM-VINDO DE VOLTA.</p>
                            
                            <form id="login_form" role="form" method="post" action="<?= base_url('home/login') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="E-mail" name="email" id="email" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Senha" name="password" id="password" required>
                                    </div>
                                    <div class="form-group has-error">
                                        <div id="login_alert" class="alert alert-danger hidden">
                                            <div id="help_login"></div>
                                        </div>
                                    </div>
                                    <button id="login_button" type="button" class="btn btn-lg btn-default btn-block">Entrar</button>
                                </fieldset>
                            </form>
                        </div>              
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery 2.2.3 -->
        <script src="<?= base_url('assets/dist/jquery/jquery.min.js') ?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?= base_url('assets/dist/bootstrap/js/bootstrap.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?= base_url('assets/plugins/fastclick/fastclick.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/adminlte/js/adminlte.min.js') ?>"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="<?= base_url('assets/plugins/slimScroll/slimscroll.min.js') ?>"></script>
        <!-- Managers AJAX -->
        <script src="<?= base_url('assets/js/ajax/managers.js') ?>"></script>
    </body>
</html>