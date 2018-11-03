<?php
    require "config.php";
    require "misc.php";

    # Validates current user session
    $conn = validate($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

    # OK if returned a valid connection
    if ($conn)
    {
        # Close current connection, we don't need it here.
        mysqli_close($conn);

        # Move to dashboard
        header("Location: ".$MAIN_URL."/dashboard");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MEE.UY — Magic: el Encuentro Uruguay</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/sweetalert2.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/misc.js"></script>
    <script src="js/forms.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

<div class="header">
  <div class="logo">
    <img width="132px" height="33px" src="images/logo.png">
  </div>
  <div id="menu" class="menu">
    <div class="links">
      <span class="item">Comunidad</span>
      <span class="item">Blog</span>
      <span class="item">Acerca de</span>
    </div>
    <div id="stuff" class="stuff">
      <div class="login">
        <div class="button" href="javascript:void(0);" onclick="popLogin()">Ingresar</div>
      </div>
      <div class="social">
        <span class="item"><i class="fab fa-discord"></i></span>
        <span class="item"><i class="fab fa-github"></i></span>
      </div>
      <div class="real_login">
        <form id="login_regular" action="ajax/login.php">
          <input name="username" id="username" class="fa-placholder" type="text" placeholder=" Usuario" required>
          <input name="password" id="password" class="fa-placholder" type="password" placeholder="Contraseña" required>
          <input type="submit" style="position: absolute; left: -9999px"/>
        </form>
      </div>
    </div>

    <div class="pop">
      <div class="pop_login">
        <div class="pop_logo">
          <img width="20px" height="20px" src="images/favicon.png">
        </div>
        <div class="login_form">
            <form id="login_mobile" action="ajax/login.php">
                <input name="username" id="username_pop" class="fa-placholder-small u-full-width" type="text" placeholder=" Usuario" required>
                <input name="password" id="username_pop" class="fa-placholder-small u-full-width" type="password" placeholder="Contraseña" required>
                <input class="button-primary u-full-width" type="submit" value="Ingresar">
            </form>
        </div>
      </div>
    </div>

    <a href="javascript:void(0);" class="icon" onclick="popMenu()">
      <i class="fa fa-bars"></i>
    </a>

  </div>
</div>

<div class="container">
  <div class="row splash">
    <span class="header"><h2><b>Llevá tu juego a otro nivel.</b></h2></span>
    Con MEEUY, podés generar alertas y enterarte cuando varían los precios de tus cartas de interés.
    <br><br>
    <p>
      <a class="button button-big-yellow" href="#"><i class="fas fa-sign-in-alt"></i> Registrarme</a>
      <a class="button button-big-black" href="#">Saber más</a>
    </p>
  </div>
</div>

<div class="planes"></div>

<!--
<div class="first_separator over">
  <div class="container">
      <div class="row">
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere ultricies velit, a laoreet ex blandit a. Sed nibh ex, luctus vel volutpat id, dictum vitae neque. Maecenas pulvinar vel nisi sed ullamcorper. Aliquam commodo arcu ipsum, at sodales nibh maximus in. Duis elementum commodo sapien eget cursus. Vestibulum at tortor nec lacus maximus scelerisque. Nullam vel molestie ligula. Donec mollis, justo ut pretium ullamcorper, lacus est vulputate eros, et scelerisque sapien tellus ultrices elit. Donec ut sapien et metus porta venenatis. Fusce felis diam, egestas sollicitudin elit eu, faucibus dignissim eros. 
    </div>
    </div>
</div>

<div class="second_separator over">
    <div class="container">
        <div class="row">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras posuere ultricies velit, a laoreet ex blandit a. Sed nibh ex, luctus vel volutpat id, dictum vitae neque. Maecenas pulvinar vel nisi sed ullamcorper. Aliquam commodo arcu ipsum, at sodales nibh maximus in. Duis elementum commodo sapien eget cursus. Vestibulum at tortor nec lacus maximus scelerisque. Nullam vel molestie ligula. Donec mollis, justo ut pretium ullamcorper, lacus est vulputate eros, et scelerisque sapien tellus ultrices elit. Donec ut sapien et metus porta venenatis. Fusce felis diam, egestas sollicitudin elit eu, faucibus dignissim eros. 
      </div>
      </div>
  </div>

<div class="third_separator">
  <div class="container">
      <div class="row">
     
          <div class="four columns"><img src="images/php.png"></div>
          <div class="four columns"><img src="images/mysql.png"></div>
          <div class="four columns"><img src="images/github.png"></div>
        </div>
  </div>
</div>-->

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>