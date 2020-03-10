<!-- menu lateral -->
<div class="col-md-3 left_col menu_fixed ">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">SEHS'</a>
        </div>
 
        <div class="profile"><!--img_2 -->
            <div class="profile_pic">
                <img src="./../../assets/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                <h2><?php echo $_SESSION['names'] ." ". $_SESSION['surnames']; ?></h2>
            </div>
        </div>
 
        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="index.html">Dashboard</a></li>
                          <li><a href="index2.html">Dashboard2</a></li>
                          <li><a href="index3.html">Dashboard3</a></li>
                        </ul>
                    </li>
                    <?php if ($_SESSION['rol']=='Administrador') {?>
                    <li><a><i class="fa fa-user"></i> Accesos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="usuario.php">Gestión de Usuarios</a></li>
                        </ul>
                    </li>
                    <li><a href="persona.php"><i class="fa fa-group"></i> Colportores</a></li>
                    <?php } ?>
                    
                    <li><a><i class="fa fa-trello"></i> Campaña <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="campania.php">Campaña</a></li>
                            <li><a href="permisoUsuario.php">Gestionar Campaña</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="e_commerce.html">E-commerce</a></li>
                            <li><a href="e_commerce_backend.html">E-commerce Backend</a></li>
                            <li><a href="projects.html">Projects</a></li>
                            <li><a href="project_detail.html">Project Detail</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="real_estate.html">Real Estate</a></li>
 
                        </ul>
                    </li>
                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="page_404.html">404 Error</a></li>
                            <li><a href="page_500.html">500 Error</a></li>
                            <li><a href="coming_soon.html">Coming Soon</a></li>
                            <li><a href="plain_page.html">Plain Page</a></li>
                            <li><a href="login.html">Login Page</a></li>
                            <li><a href="sign_up.html">SignUp Page</a></li>
                            <li><a href="pricing_tables.html">Pricing Tables</a></li>
 
                        </ul>
                    </li>
                    <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
            </div>
 
        </div>
 
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>