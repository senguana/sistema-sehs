

<div class="login_wrapper">
  <div class="animate form login_form">
    <section class="login_content">

      <form action="" method="POST" autocomplete="off" class="LoginForm">
        <h1>SEHS</h1>

        <div class="form-group">
          <input type="text" name="usuario" class="form-control" placeholder="Username" requerid  />
        </div>
        <div class="form-group">
          <input type="password" name="clave" class="form-control" placeholder="Password" requerid/>
        </div>
        <label>Iniciar sesión como:</label>
        <div class="form-group">
          <select name="rol" class="form-control" >
            <option value="">Seleccionar rol..</option>
            <option value="1">Administrador</option>
            <option value="2">Lider</option>
          </select>
          
        </div>
        <div class="separator">
          <button requerid="" type="submit" class="btn btn-success">Ingresar</button>
        </div>
      </form>
      <?php 
        if (isset($_POST['usuario']) && isset($_POST['clave']) && isset($_POST['rol'])) {
        require_once './controllers/ControladorLogin.php';

        $login= new ControladorLogin();
        echo $login->iniciar_sesion_controlador();
        }

      ?>
      <div>
            <p>©2019 All Rights Reserved. Privacy and Terms</p>
      </div>
    </section>
  </div>
</div>
    

