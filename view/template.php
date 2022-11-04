<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--===============================================
  Lib CSS
  =================================================-->
  <link rel="stylesheet" href="view/css/main.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
  <!-- Boostrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Carrusel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
  <!--===============================================
  lib js
  =================================================-->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <link rel="icon" href="view/src/img/icono.png" sizes="64x64">

  <title>Ignilytic - TI</title>

</head>

<body>

  <div class="wrapper">

    <?php
      //* ===============================================
      //* Mobile and PC Menu
      //* ===============================================
      /* include_once 'view/components/menu.php'; */

      //* ===============================================
      //* White List URL
      //* ===============================================
      if(isset($_GET["url"])){

        if($_GET["url"] == "inicio" 
         
        ){

          include "pages/".$_GET["url"].".php";

        }else{

            include "pages/404.php";
        }

      }else{
          include "pages/inicio.php";
      }
      //* ===============================================
      //* Footer
      //* ===============================================
      /* include_once 'view/components/footer.php'; */
    ?>

  </div>

  <!-- <script src="view/js/main.js"></script> -->

</body>

</html>
