<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url('icons/logo.png') ?>" type="image/x-icon"/>
        <!-- Title -->
        <title>Tale of Valhalla</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/bootstrap/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/font-awesome/css/font-awesome.min.css') ?>">
        <!-- RPG Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/rpg-awesome/css/rpg-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/ionicons/css/ionicons.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/whhg/css/whhg.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/adminlte.min.css') ?>">
        <!-- AdminLTE Skins. -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/skins/skin-black.min.css') ?>">
        <!-- Tale of Valhalla -->
        <link rel="stylesheet" href="<?= base_url('assets/css/tale-of-valhalla.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-black sidebar-collapse sidebar-mini">
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->
                <a href="<?= base_url('home') ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><img src="<?= base_url('icons/logo.png') ?>" class="mini-logo-header"></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg tittle-header"><img src="<?= base_url('icons/logo.png') ?>" class="logo-header"> Tale of Valhalla</span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php if ($this->session->selected_class == 1) { ?>
                                        <img src="<?= base_url('/icons/axe.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"> <strong> Guerreiro </strong> &nbsp; &nbsp;
                                    <?php } else if ($this->session->selected_class == 2) { ?>
                                        <img src="<?= base_url('/icons/bow.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"> <strong> Arqueiro </strong> &nbsp; &nbsp;
                                    <?php } else if ($this->session->selected_class == 3) { ?>
                                        <img src="<?= base_url('/icons/staff.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"> <strong> Mago </strong> &nbsp; &nbsp;
                                    <?php } else if ($this->session->selected_class == 4) { ?>
                                        <img src="<?= base_url('/icons/dagger.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"> <strong> Assassino </strong> &nbsp; &nbsp;
                                    <?php } ?>
                                    <img src="<?= base_url('/icons/gold.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"><strong>Ouro: </strong> <?= $riches->gold ?> &nbsp; &nbsp;
                                    <img src="<?= base_url('/icons/runes.png') ?>" style="margin-right: 5px; margin-top: -10px; margin-bottom: -5px;" width="20px" height="20px"><strong>Runas: </strong> <?= $riches->runes ?>
                                </a>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url('/pictures/' . $this->session->picture) ?>" class="user-image" alt="<?= $this->session->username ?>">
                                    <span class="hidden-xs"><?= $this->session->username ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= base_url('/pictures/' . $this->session->picture) ?>" class="img-circle" alt="<?= $this->session->username ?>">

                                        <p>
                                            <strong><?= $this->session->username ?></strong>

                                            <br>

                                            <?= $this->session->name ?>

                                            <small> Membro desde: <strong><?= $this->session->date ?></strong> </small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-info btn-flat">Perfil</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= base_url('home/leave') ?>" class="btn btn-danger btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="treeview <?= $this->session->navigation_battle == true ? " active" : "" ?>">
                            <a href="#">
                                <i class="fa fa-play"></i>
                                <span>Jogar</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->session->navigation == "ai_battle" ? "class='active'" : "" ?>><a href="<?= base_url('play/adventures') ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Aventuras</span></a></li>
                                <li <?= $this->session->navigation == "battle" ? "class='active'" : "" ?>><a href="<?= base_url('play/battles') ?>"><i class="fa fa-circle-o text-red"></i> <span>Batalhas</span></a></li>
                            </ul>
                        </li>
                        <li <?= $this->session->navigation == "home" ? "class='active'" : "" ?>><a href="<?= base_url('home') ?>"><i class="fa fa-list"></i> <span>Status</span></a></li>
                        <li <?= $this->session->navigation == "characters" ? "class='active'" : "" ?>><a href="<?= base_url('characters') ?>"><i class="fa fa-male"></i> <span>Personagens</span></a></li>
                        <li <?= $this->session->navigation == "equipment" ? "class='active'" : "" ?>><a href="<?= base_url('equipment') ?>"><i class="icon icon-sword"></i> <span>Equipamento</span></a></li>
                        <li <?= $this->session->navigation == "inventory" ? "class='active'" : "" ?>><a href="<?= base_url('inventory') ?>"><i class="fa fa-briefcase"></i> <span>Inventário</span></a></li>
                        <li <?= $this->session->navigation == "items" ? "class='active'" : "" ?>><a href="<?= base_url('items') ?>"><i class="fa fa-dollar"></i> <span>Loja</span></a></li>
                        <li class="treeview <?= $this->session->navigation_history == true ? " active" : "" ?>">
                            <a href="#">
                                <i class="fa fa-history"></i>
                                <span>Histórico</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->session->navigation == "ai_battle_history" ? "class='active'" : "" ?>><a href="<?= base_url('ai_battle_history') ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Aventuras</span></a></li>    
                                <li <?= $this->session->navigation == "battle_history" ? "class='active'" : "" ?>><a href="<?= base_url('battle_history') ?>"><i class="fa fa-circle-o text-red"></i> <span>Batalhas</span></a></li>   
                            </ul>
                        </li>
                        <li class="treeview <?= $this->session->navigation_ranking == true ? " active" : "" ?>">
                            <a href="#">
                                <i class="fa fa-list-ol"></i>
                                <span>Ranking</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->session->navigation == "ranking_stats" ? "class='active'" : "" ?>><a href="<?= base_url('ranking_stats') ?>"><i class="fa fa-circle-o text-aqua"></i> <span>Força</span></a></li>
                                <li <?= $this->session->navigation == "ranking_ai_wins" ? "class='active'" : "" ?>><a href="<?= base_url('ranking_ai_wins') ?>"><i class="fa fa-circle-o text-yellow"></i> <span>Aventuras Vencidas</span></a></li>
                                <li <?= $this->session->navigation == "ranking_wins" ? "class='active'" : "" ?>><a href="<?= base_url('ranking_wins') ?>"><i class="fa fa-circle-o text-red"></i> <span>Batalhas Vencidas</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">