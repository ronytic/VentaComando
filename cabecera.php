</head>
<!-- /Head -->
<!-- Body -->
<body>
    <!-- Loading Container -->
    <div class="loading-container">
        <div class="loader"></div>
    </div>
    <!--  /Loading Container -->
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="navbar-container">
                <!-- Navbar Barnd -->
                <div class="navbar-header pull-left">
                    <a href="#" class="navbar-brand">
                        <small>
                            <img src="<?php echo $folder?>/imagenes/logo/comando.jpg" alt="" />
                        </small>
                    </a>
                </div>
                <!-- /Navbar Barnd -->
                <!-- Sidebar Collapse -->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="collapse-icon fa fa-bars"></i>
                </div>
                <!-- /Sidebar Collapse -->
                <!-- Account Area and Settings --->
                <div class="navbar-header pull-right">
                    <div class="navbar-account">
                        <ul class="account-area">
                            <li>
                                <a class=" dropdown-toggle" data-toggle="dropdown" title="Help" href="#">
                                    <i class="icon fa fa-warning"></i>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" title="Mails" href="#">
                                    <i class="icon fa fa-envelope"></i>
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" title="Tasks" href="#">
                                    <i class="icon fa fa-tasks"></i>
                                   
                                </a>
                            </li>
                            <li>
                                <a class="wave in" id="chat-link" title="Chat" href="#">
                                    <i class="icon glyphicon glyphicon-comment"></i>
                                </a>
                            </li>
                            <li>
                                <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                    <div class="avatar" title="View your public profile">
                                        <img src="<?php echo $folder?>imagenes/usuarios/alexvargas.jpg">
                                    </div>
                                    <section>
                                        <h2><span class="profile"><span>Alex Vargas</span></span></h2>
                                    </section>
                                </a>
                                <!--Login Area Dropdown-->
                                <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                    <li class="username"><a>Alex Vargas</a></li>
                                    <li class="email"><a>casacomandogaff@hotmail.com</a></li>
                                    <!--Avatar Area-->
                                    <li>
                                        <div class="avatar-area">
                                            <img src="<?php echo $folder?>imagenes/usuarios/alexvargas.jpg" class="avatar">
                                        </div>
                                    </li>
                                    <!--Avatar Area-->
                                    <li class="edit">
                                        <a href="profile.html" class="pull-left">Cambiar Contraseña</a>
                                    </li>
                                    <li class="dropdown-footer">
                                        <a href="<?php echo $folder?>/login/logout.php">
                                            Salir del Sistema
                                        </a>
                                    </li>
                                </ul>
                                <!--/Login Area Dropdown-->
                            </li>
                            <!-- /Account Area -->
                            <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                            <!-- Settings -->
                        </ul>
                        
                    </div>
                </div>
                <!-- /Account Area and Settings -->
            </div>
        </div>
    </div>
    <!-- /Navbar -->
    <!-- Main Container -->
    <div class="main-container container-fluid">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Búqueda de productos</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="<?php echo $folder;?>">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text">Ventas</span>
                        </a>
                    </li>
                    
                    
                    <!--UI Elements-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-arrow-right"></i>
                            <span class="menu-text"> Productos </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo $folder;?>productos/registro/">
                                    <span class="menu-text">Nuevo Producto</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $folder;?>productos/registro/listar.php">
                                    <span class="menu-text">Ver Productos</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="menu-dropdown">
                                    <i class="menu-icon fa fa-arrow-right"></i>
                                    <span class="menu-text"> Categoria </span>
                                    <i class="menu-expand"></i>
                                </a>
                            <ul class="submenu">
                            <li>
                                <a href="<?php echo $folder;?>productos/categoria/">
                                    <span class="menu-text">Nueva Categoria</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $folder;?>productos/categoria/listar.php">
                                    <span class="menu-text">Ver Catergorias</span>
                                </a>
                            </li>
                            </ul>
                            </li>
                        </ul>
                     </li>
                     <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-arrow-right"></i>
                            <span class="menu-text"> Inventario </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo $folder;?>productos/">
                                    <span class="menu-text">Recargar Inventario</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $folder;?>productos/listar.php">
                                    <span class="menu-text">Revisar Inventario</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-print"></i>
                            <span class="menu-text"> Reporte </span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="<?php echo $folder;?>productos/">
                                    <span class="menu-text">Estado del Inventario</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $folder;?>productos/listar.php">
                                    <span class="menu-text">Ventas del Día</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav sidebar-menu">
                <img src="<?php echo $folder;?>imagenes/assets/esquina.jpg">
                </ul>

                <!-- /Sidebar Menu -->
            </div>
            <!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs" style="background-image:url(<?php echo $folder;?>imagenes/assets/fondo6.jpg)">
                    <marquee style="margin:0;padding:0">
                    <img src="<?php echo $folder;?>imagenes/banner/1.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/2.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/3.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/4.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/5.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/6.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/7.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    <img src="<?php echo $folder;?>imagenes/banner/8.jpg" class="img-thumbnail" height="150" style="height:150px !important">
                    </marquee>
                </div>
                <!-- /Page Breadcrumb -->
                <!-- Page Header -->
                <div class="page-header position-relative">
                    <div class="header-title">
                        <h1>
                            <strong><?php echo $titulo;?></strong>
                        </h1>
                    </div>
                    <!--Header Buttons-->
                    <div class="header-buttons">
                        <a class="sidebar-toggler" href="#">
                            <i class="fa fa-arrows-h"></i>
                        </a>
                        <a class="refresh" id="refresh-toggler" href="#">
                            <i class="glyphicon glyphicon-refresh"></i>
                        </a>
                        <a class="fullscreen" id="fullscreen-toggler" href="#">
                            <i class="glyphicon glyphicon-fullscreen"></i>
                        </a>
                    </div>
                    <!--Header Buttons End-->
                </div>
                <!-- /Page Header -->
                <!-- Page Body -->
                <div class="page-body" style="background-image:url(<?php echo $folder;?>imagenes/assets/comando8.jpg);background-size:cover">
                <div class="row">