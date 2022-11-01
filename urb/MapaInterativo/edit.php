<?php
session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
  <title>Projeto GeoDireito</title>
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <!-- ************ BOOTSTRAP ************ -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <!-- ************************************ -->
  <!-- ************ CSS CONTENT ************ -->
  <link rel="stylesheet" href="../public/styles/partials/header.css" />
  <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css" />
  <link rel="stylesheet" href="../public/styles/footer.css" />
  <link rel="stylesheet" href="../public/styles/main.css" />
  <!-- ************************************ -->
  <!-- ************ FONT CONTENT ************ -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet" />
  <!-- ************************************ -->
  <!-- ************ JQUERY ************ -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
  <!-- ************************************ -->
  <!-- ************ SWEET ALERT ************ -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- ************************************ -->
  <!-- ************ ICON LIBT ************ -->
  <script src="https://kit.fontawesome.com/79d3dea737.js" crossorigin="anonymous"></script>
  <!-- ************************************ -->

  <!-- ************ FORM LIB ************ -->
  <link rel="stylesheet" href="https://cdn.form.io/formiojs/formio.full.min.css">
  <script src="https://cdn.form.io/formiojs/formio.full.min.js"></script>
  <!-- ************************************ -->
  <!-- ~~~~~~~~~~~~~~ LEAFLET JS/CSS ~~~~~~~~~~~~~~ -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css" integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14=" crossorigin="" />
  <script src="js/leaflet.js"></script>
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <!-- ~~~~~~~~~~~~~~ LEAFLET WINDOW POPUP MODAL ~~~~~~~~~~~~~~ -->
  <!-- <script src="leaflet-control-window-master/src/L.Control.Window.js"></script>
  <link rel="stylesheet" href="leaflet-control-window-master/src/L.Control.Window.css" /> -->
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <!-- ~~~~~~~~~~~~~~ LEAFLET GEOMAN TOOLS ~~~~~~~~~~~~~~ -->
  <link rel="stylesheet" href="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.css" />
  <script src="https://unpkg.com/@geoman-io/leaflet-geoman-free@latest/dist/leaflet-geoman.min.js"></script>
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <!-- ~~~~~~~~~~~~~~ LEAFLET FULLSCREEN PLUGIN ~~~~~~~~~~~~~~ -->
  <script src="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js"></script>
  <link href="https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css" rel="stylesheet" />
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <!-- ~~~~~~~~~~~~~~ LEAFLET RULER PLUGIN ~~~~~~~~~~~~~~ -->
  <script src="Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.js"></script>
  <link href="Leaflet.LinearMeasurement-master/src/Leaflet.LinearMeasurement.css" rel="stylesheet" />
  <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
  <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

  <link rel="stylesheet" href="L.cascadeButtons-master/src/L.cascadeButtons.css">
  <script src="L.cascadeButtons-master/src/L.cascadeButtons.js"></script>

  <link rel="stylesheet" href="Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.css">
  <script src="Leaflet.Control.Layers.Tree-master/L.Control.Layers.Tree.js"></script>

  <script src='https://unpkg.com/@turf/turf@6/turf.min.js'></script>
  <!-- ************************************ -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body id="page-instrucoes">
  <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-dialog modal-lg" role="document">
      <div id="hideonstart" class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Geometria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="forminsert">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="modaladdlayer" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Camada</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="modaladdlayerforminsert">
          </div>
        </div>
      </div>
    </div>
  </div>
  <header class="page-header">
    <!-- header menu local load -->
    <div class="top-bar-container-2" style="height: 30px">
      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: white">
        <div class="logo-title">
          <a>
            <img class="logo_pref_horizontal" src="../public/images/Screenshot_62-removebg-preview.png" alt="" />
          </a>
        </div>
        <div class="container-fluid" style="
              text-align: center;
              display: inline-block;
              position: relative;
              text-align: -webkit-center;
            ">
          <button class="navbar-toggler" type="button" id="nav-button">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- <div> -->
          <div class="navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav" style="gap: 25px">
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Inicio</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle show" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                  <b class="first-link">Institucional</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="projetos.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Projetos</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Publicações e Eventos</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Trabalho de Campo</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Relatórios</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Parceiros</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Notícias</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space: nowrap">
                  <b class="first-link">Fale Conosco</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <div class="sample-header">
    <div class="sample-header-section">
      <h1>EDITOR DE CAMADAS</h1>
    </div>
  </div>
  <style>

  </style>
  <?php
  if (!isset($_SESSION["start"])) { ?>
    <div class='container'>
      <div class='window'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='welcome'>Login</div>
          <div class='subtitle'>Para poder começar a edição de camadas é necessário fazer o login.</div>
          <input type='text' placeholder='Usuário' class='input-line full-width'></input>
          <input type='password' placeholder='Senha' class='input-line full-width'></input>
          <div><button id="submit" class='ghost-round full-width'>Login</button></div>
        </div>
      </div>
    </div>
    <script>
      $("#submit").click(function(e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "sessionconection.php",
          success: function(result) {
            window.location.reload();
          },
          error: function(result) {
            alert('error');
          }
        });
      });
    </script>
  <?php } else {
  ?>
    <div class='mapdiv'>
      <div id="map" style="z-index: 1"></div>
    </div>

    <!-- <div id="myModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="hideonstart" class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adicionar Geometria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="forminsert">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="modaladdlayer" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Adicionar Camada</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="modaladdlayerforminsert">
            </div>
          </div>
        </div>
      </div>
    </div> -->


    <script src="mapmodule.js"></script>

  <?php } ?>
</body>



</html>
<script>
  $(function() {
    var includes = $("[data-include]");
    $.each(includes, function() {
      var file = "../views/" + $(this).data("include") + ".php";
      $(this).load(file);
    });
  });
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>