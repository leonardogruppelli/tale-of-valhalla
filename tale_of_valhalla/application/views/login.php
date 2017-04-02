<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url('icons/logo.png') ?>" type="image/x-icon"/>

        <title>Tale of Valhalla</title>

        <!-- Bootstrap CSS -->
        <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.css') ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url('assets/vendor/metisMenu/metisMenu.min.css') ?>" rel="stylesheet">

        <!-- SB ADMIN CSS -->
        <link href="<?= base_url('assets/dist/css/sb-admin-2.css" rel="stylesheet') ?>">
        
        <!-- W3 CSS -->
        <link href="<?= base_url('assets/vendor/w3/w3.css" rel="stylesheet') ?>">

        <!-- My CSS -->
        <link href="<?= base_url('assets/css/tale-of-valhalla-admin.css" rel="stylesheet') ?>">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url('assets/vendor/morrisjs/morris.css" rel="stylesheet') ?>">

        <!-- Custom Fonts -->
        <link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" type="text/css">

        <!-- jQuery -->
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

        <!-- Bootstrap JavaScript -->
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.js') ?>"></script>

        <!-- Bootstrap Confirmation JavaScript -->
        <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap-confirmation.min.js') ?>"></script>

        <!-- My JavaScript -->
        <script src="<?= base_url('assets/js/tale-of-valhalla-admin.js') ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url('assets/vendor/metisMenu/metisMenu.min.js') ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?= base_url('assets/vendor/raphael/raphael.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/morrisjs/morris.min.js') ?>"></script>
        <script src="<?= base_url('assets/data/morris-data.js') ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url('assets/dist/js/sb-admin-2.js') ?>"></script>

        <!-- Administrators AJAX -->
        <script src="<?= base_url('assets/js/ajax/users.js') ?>"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="login-body">

        <div class="container">
            <div class="row center-row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <center>
                                <img src="<?= base_url('icons/logo.png') ?>" class="logo-login">
                                <span class="panel-title tittle">Tale</span> <br>
                                <span class="panel-title tittle">of</span> <br>
                                <span class="panel-title tittle">Valhalla</span>
                            </center>
                        </div>
                        <div class="panel-body">
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
                                    <button id="login_button" type="button" class="btn btn-lg btn-default btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
