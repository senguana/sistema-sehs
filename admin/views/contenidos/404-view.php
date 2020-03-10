
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo COMPANY; ?></title>

    <?php include_once './views/include/styles.php'; ?>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">404</h1>
              <h2>Lo sentimos pero no pudimos encontrar esta página</h2>
              <p>Esta página que busca no existe<a href="<?php echo SERVERURL; ?>admin/home"> Regresar</a>
              </p>

            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </body>
</html>

 