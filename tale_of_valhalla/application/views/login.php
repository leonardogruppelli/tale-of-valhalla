<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url('icons/logo.png') ?>" type="image/x-icon"/>
        <title>Tale of Valhalla</title>
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
        <link rel="stylesheet" href="<?= base_url('assets/dist/materialize/css/materialize.min.css') ?>">
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

        <div class="col-sm-12 center-div">
            <div class="card horizontal login-card">
                <div class="card-content logo-card bg-gray">
                    <p class="tittle"><img src="<?= base_url('icons/logo.png') ?>" class="logo-login"><br>Tale<br>of<br>Valhalla</p>
                </div>
                <div class="card-stacked">
                    <div class="card-content bg-black-gradient">
                        <div class="col s12">
                            <ul class="tabs tabs-fixed-width">
                                <li class="tab col s6"><a class="active" href="#sign_in">Login</a></li>
                                <li class="tab col s6"><a href="#sign_up">Cadastro</a></li>
                            </ul>
                        </div>
                        <div id="sign_in" class="col s12">
                            <form id="login_form" role="form" method="post" action="<?= base_url('home/sign_in') ?>">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nome de usuário" name="username" id="username" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Senha" name="password" id="password" required>
                                    </div>
                                    <div class="form-group">
                                        <div id="login_alert" class="alert alert-danger hidden">
                                            <div id="help_login"></div>
                                        </div>
                                    </div>
                                    <button id="login_button" type="button" class="waves-effect waves-light btn black btn-block">Entrar</button>
                                </fieldset>
                            </form>

                            <?php
                            if ($this->session->has_userdata('message')) {
                                $message = $this->session->flashdata('message');
                                if ($this->session->flashdata('situation') == '1') {
                                    echo "<div class='col s12' style='margin-top: 10px; margin-left: 10px; margin-right: 10px'>";
                                    echo "<div class='alert alert-success alert-dismissable'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                    echo "</div>";
                                } else {
                                    echo "<div class='col s12' style='margin-top: 10px; margin-left: 10px; margin-right: 10px'>";
                                    echo "<div class='alert alert-danger alert-dismissable'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                    echo $message;
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            ?>
                        </div>
                        <div id="sign_up" class="col s12">
                            <form id="sign_up_form" role="form" method="post" action="<?= base_url('home/sign_up') ?>" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="input-field col s6">
                                        <input type="text" name="name" id="register_name" required>
                                        <label id="label_name" for="register_name">Nome</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input type="text" name="username" id="register_username" required>
                                        <label id="label_username" for="register_username">Nome de Usuário</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input type="email" name="email" id="register_email" required>
                                        <label id="label_email" for="register_email">E-mail</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input type="password" name="password" id="register_password" required>
                                        <label id="label_password" for="register_password">Senha</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input type="password" name="confirm_password" id="register_confirm_password" required>
                                        <label id="label_confirm_password" for="register_confirm_password">Confirmar Senha</label>
                                    </div>

                                    <center>
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <div class="form-group">
                                                <img id="image" src="<?= base_url('icons/user_icon.png') ?>" class="img-rounded img-thumbnail avatar" width="100px" height="100px">
                                                <input type="file" class="form-control" name="picture" id="register_picture" accept=".gif,.jpg,.png" required>
                                            </div>
                                        </div>
                                    </center>

                                    <div class="col s12">
                                        <div class="form-group">
                                            <div class="btn-group btn-block">
                                                <button id="insert_button" type="submit" class="waves-effect waves-light btn black btn-form">Cadastrar</button>
                                                <button id="reset_button" type="reset" class="waves-effect waves-light btn black btn-form">Limpar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
        <!-- Materialize -->
        <script src="<?= base_url('assets/dist/materialize/js/materialize.min.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url('assets/dist/adminlte/js/adminlte.min.js') ?>"></script>
        <!-- Bootstrap Confirmation -->
        <script src="<?= base_url('assets/dist/bootstrap/js/bootstrap-confirmation.min.js') ?>"></script>
        <!-- Tale of Valhalla JS -->
        <script src="<?= base_url('assets/js/tale-of-valhalla.js') ?>"></script>
        <!-- Managers AJAX -->
        <script src="<?= base_url('assets/js/ajax/users.js') ?>"></script>
    </body>
</html>