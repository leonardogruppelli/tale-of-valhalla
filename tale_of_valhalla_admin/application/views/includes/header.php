<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Favicon -->
        <link rel="icon" href="<?= base_url('icons/logo.png') ?>" type="image/x-icon"/>
        <!-- Title -->
        <title>Tale of Valhalla | ADMIN</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/bootstrap/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/ionicons/css/ionicons.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/adminlte.min.css') ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?= base_url('assets/dist/adminlte/css/skins/skin-black.min.css') ?>">
        <!-- Tale of Valhalla CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/css/tale-of-valhalla.css') ?>">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition skin-black sidebar-mini">
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
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs"><?= $this->session->admin_name ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= base_url('icons/manager.jpg') ?>" class="img-circle" alt="Leonardo Gruppelli">
                                        
                                        <p>
                                            <?= $this->session->admin_name ?>
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
                        <li <?= $this->session->admin_navigation == "dashboard" ? "class='active'" : "" ?>><a href="<?= base_url('home') ?>"><i class="fa fa-pie-chart"></i> <span>Dashboard</span></a></li>
                        <li class="treeview <?= $this->session->admin_navigation_tables == true ? " active" : "" ?>">
                            <a href="#">
                                <i class="fa fa-table"></i>
                                <span>Tabelas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li <?= $this->session->admin_navigation == "classes" ? "class='active'" : "" ?>><a href="<?= base_url('classes') ?>"><i class="fa fa-circle-o text-red"></i> Classes</a></li>
                                <li <?= $this->session->admin_navigation == "types" ? "class='active'" : "" ?>><a href="<?= base_url('types') ?>"><i class="fa fa-circle-o text-red"></i> Tipos</a></li>
                                <li <?= $this->session->admin_navigation == "items" ? "class='active'" : "" ?>><a href="<?= base_url('items') ?>"><i class="fa fa-circle-o text-red"></i> Items</a></li>
                                <li <?= $this->session->admin_navigation == "enemies" ? "class='active'" : "" ?>><a href="<?= base_url('enemies') ?>"><i class="fa fa-circle-o text-red"></i> Inimigos</a></li>
                                <li <?= $this->session->admin_navigation == "users" ? "class='active'" : "" ?>><a href="<?= base_url('users') ?>"><i class="fa fa-circle-o text-red"></i> Usuários</a></li>
                            </ul>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">