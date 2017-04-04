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

        <!-- Morris Charts CSS -->
        <link href="<?= base_url('assets/vendor/morrisjs/morris.css" rel="stylesheet') ?>">

        <!-- Font Awesome Fonts -->
        <link href="<?= base_url('assets/vendor/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" type="text/css">

        <!-- WebHostingHub Fonts -->
        <link href="<?= base_url('assets/vendor/webhostinghub/css/whhg.css') ?>" rel="stylesheet" type="text/css">

        <!-- My CSS -->
        <link href="<?= base_url('assets/css/tale-of-valhalla-admin.css" rel="stylesheet') ?>">

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
        
        <!-- Users AJAX -->
        <script src="<?= base_url('assets/js/ajax/users.js') ?>"></script>

        <!-- Items AJAX -->
        <script src="<?= base_url('assets/js/ajax/items.js') ?>"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('home') ?>"> <img src="<?= base_url('icons/logo.png') ?>" class="logo-header"> <span> Tale of Valhalla</span></a>
                </div>
                <!-- /.navbar-header -->

                <ul class="nav navbar-top-links navbar-right">
                    <?php if ($this->session->selected_character == 1) { ?>
                        <img src="<?= base_url('/icons/weapon.png') ?>" style="margin-right: 5px" width="20px" height="20px"> <strong> Guerreiro </strong> &nbsp; &nbsp;
                    <?php } else if ($this->session->selected_character == 2) { ?>
                        <img src="<?= base_url('/icons/bow.png') ?>" style="margin-right: 5px" width="20px" height="20px"> <strong> Arqueiro </strong> &nbsp; &nbsp;
                    <?php } else if ($this->session->selected_character == 3) { ?>
                        <img src="<?= base_url('/icons/staff.png') ?>" style="margin-right: 5px" width="20px" height="20px"> <strong> Mago </strong> &nbsp; &nbsp;
                    <?php } else if ($this->session->selected_character == 4) { ?>
                        <img src="<?= base_url('/icons/dagger.png') ?>" style="margin-right: 5px" width="20px" height="20px"> <strong> Assassino </strong> &nbsp; &nbsp;
                    <?php } ?>
                    <img src="<?= base_url('/icons/gold.png') ?>" style="margin-right: 5px" width="20px" height="20px"><strong>Ouro: </strong> <?= $this->session->gold ?> &nbsp; &nbsp;
                    <img src="<?= base_url('/icons/gems.png') ?>" style="margin-right: 5px" width="20px" height="20px"><strong>Gemas: </strong> <?= $this->session->gems ?>
                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?= $this->session->name ?> &nbsp; <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?= base_url('home/leave') ?>"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li style="text-align: center; font-size: 20px; vertical-align: middle">
                                <a href="<?= base_url('home') ?>">Jogar <i class="fa fa-arrow-circle-right fa-1x"></i></a>
                            </li>
                            <li>
                                <a href="<?= base_url('characters') ?>"><i class="fa fa-male fa-fw"></i> Personagens</a>
                            </li>
                            <li>
                                <a href="<?= base_url('items') ?>"><i class="fa fa-dollar fa-fw"></i> Itens</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper" style="min-height: 950px">