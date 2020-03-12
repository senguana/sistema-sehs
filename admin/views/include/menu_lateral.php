<!-- menu lateral -->
<div class="col-md-3 left_col menu_fixed ">
    <div class="left_col scroll-view">
 
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title">SEHS'</a>
        </div>
 
        <div class="profile"><!--img_2 -->
            <div class="profile_pic">
                <img src="<?php echo SERVERURL; ?>admin/assets/images/avatars/<?php echo $_SESSION['foto_sehs']; ?>" alt="..." class="img-circle profile_img">   
            </div>
            <div class="profile_info">
                <span>Bienvenido,</span>
                 <?php 
                   $Nombre= explode(" ", $_SESSION['AdminNombre']);
                   $Apellido = explode(" ", $_SESSION['AdminApellido']);
                 ?>
                 <h2><?php echo $Nombre[0] . " " .$Apellido[0]; ?></h2>
            </div>
        </div>
        <br>
        
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
 
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="<?php echo SERVERURL; ?>admin/home"><i class="fa fa-home"></i> Home </a>
                    </li>
                    <?php if ($_SESSION['cuenta_tipo_sehs']==1 && $_SESSION['privilegio_sehs'] ==1):?>
                    <li><a><i class="fa fa-user"></i> Accesos <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo SERVERURL; ?>admin/admin">Adminisradores</a></li>
                            <li><a href="<?php echo SERVERURL; ?>admin/usuario">Usuarios</a></li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    <?php 
                      if ($_SESSION['cuenta_tipo_sehs']==1 && $_SESSION['privilegio_sehs'] ==1) {?>
                           <li><a href="<?php echo SERVERURL; ?>admin/admin-colportor"><i class="fa fa-group"></i> Colportores</a></li>
                      <?php }else{?>
                      <li><a href="<?php echo SERVERURL; ?>admin/colportor"><i class="fa fa-group"></i> Colportores</a></li>
                      <?php }?>
                      <li><a href="<?php echo SERVERURL; ?>admin/clientes"><i class="fa fa-group"></i> Clientes</a></li>
                    
                     <?php if ($_SESSION['cuenta_tipo_sehs']==1 && $_SESSION['privilegio_sehs'] ==1):?>
                    <li><a><i class="fa fa-trello"></i> Campaña <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo SERVERURL; ?>admin/campania">Campaña</a></li>
                            <li><a href="<?php echo SERVERURL; ?>admin/gestionar-campania">Gestionar Campaña y Usuarios</a></li>
                        </ul>
                    </li>

                    <li><a href="<?php echo SERVERURL; ?>admin/libros"><i class="fa fa-book"></i> Libros</a></li>
                     <?php endif; ?>
                    <li><a href="<?php echo SERVERURL; ?>admin/facturas"><i class='fa fa-archive'></i> Registro de pedidos</a></li>
                    <?php if ($_SESSION['cuenta_tipo_sehs']==1 && $_SESSION['privilegio_sehs'] ==1): ?>
                    <li><a><i class="fa fa-bug"></i> Empresa <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="e_commerce.html">Configuración</a></li>
                        <li><a href="e_commerce_backend.html">E-commerce Backend</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project Detail</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="real_estate.html">Real Estate</a></li>

                    </ul>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
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
 
        <div class="sidebar-footer hidden-small">
            <a href="<?php echo SERVERURL; ?>admin/empresa" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a href=" <?php echo  $lc->encryption($_SESSION['token_sehs']) ?>;" data-toggle="tooltip" data-placement="top" title="Logout" class="btn-exit-system">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</div>