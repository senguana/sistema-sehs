<?php 
 if ( $_SESSION['cuenta_tipo_sehs']!= 1) {
   echo $lc->forzar_cerrar_sesion_controlador();
 }
 ?>
<div class="right_col" role="main">
  <?php 
    require_once './controllers/ControladorAdministrador.php';
    require_once './controllers/ControladorCampania.php';
    $IAdmin = new ControladorAdministrador();
    $IACamp = new ControladorCampania();
    $CAdmin = $IAdmin->datos_administrador_controlador("Conteo", 0);
    $CAcamp = $IACamp->datos_campania_controlador("Conteo", 0);
   ?>
  <div class="row" style="display: inline-block;" >
    <div class="tile_count">
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>  Administradores</span>
        <div class="count"><?php echo $CAdmin->rowCount();?></div>
        <span class="count_bottom"><i class="green">Registrados </i> </span>
      </div>
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i>  Usuarios totales</span>
        <div class="count">2500</div>
      </div>
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Hombres totales</span>
        <div class="count green">2,500</div>
      </div>
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Mujeres totales</span>
        <div class="count">4,567</div>
      </div>
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-user"></i> Pastores</span>
        <div class="count">2,315</div>
      </div>
      <div class="col-md-2 col-sm-2  tile_stats_count">
        <span class="count_top"><i class="fa fa-trello"></i> Campañas</span>
        <div class="count"><?php echo $CAcamp->rowCount();?></div>
        <span class="count_bottom"><i class="green">Campañas realizadas</i> </span>
      </div>
    </div>
    <div class="col-md-12 col-sm-12  ">
      <div class="x_panel">
        <div class="x_title">
          <h2>Daily active users <small>Sessions</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <ul class="list-unstyled timeline">
            <li>
              <div class="block">
                <div class="tags">
                  <a href="" class="tag">
                    <span>Entertainment</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                                  <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                  <div class="byline">
                    <span>13 hours ago</span> by <a>Jane Smith</a>
                  </div>
                  <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="block">
                <div class="tags">
                  <a href="" class="tag">
                    <span>Entertainment</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                                  <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                  <div class="byline">
                    <span>13 hours ago</span> by <a>Jane Smith</a>
                  </div>
                  <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                  </p>
                </div>
              </div>
            </li>
            <li>
              <div class="block">
                <div class="tags">
                  <a href="" class="tag">
                    <span>Entertainment</span>
                  </a>
                </div>
                <div class="block_content">
                  <h2 class="title">
                                  <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                              </h2>
                  <div class="byline">
                    <span>13 hours ago</span> by <a>Jane Smith</a>
                  </div>
                  <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                  </p>
                </div>
              </div>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
</div>