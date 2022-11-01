<?php
include_once('conexao.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="initial-scale=1,user-scalable=no,maximum-scale=1,width=device-width" />
  <title>Projeto GeoDireito</title>
  <meta name="mobile-web-app-capable" content="yes" />
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <link rel="stylesheet" href="css/leaflet.css" />
  <link rel="stylesheet" href="css/L.Control.Locate.min.css" />
  <link rel="stylesheet" href="css/qgis2web.css" />
  <link rel="stylesheet" href="css/fontawesome-all.min.css" />
  <link rel="stylesheet" href="css/leaflet-control-geocoder.Geocoder.css" />
  <link rel="stylesheet" href="css/leaflet-measure.css" />
  <link rel="stylesheet" href="..\public\js\Leaflet.draw-0.4.14\dist\leaflet.draw.css" />
  <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="../public/styles/partials/header.css">
  <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css">
  <link rel="stylesheet" href="../public/styles/footer.css">
  <link rel="stylesheet" href="../public/styles/main.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;700&amp;family=Poppins:wght@400;600&amp;display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <style>
    .portugues {
      font-size: 2rem;
      color: black;
    }

    .insidestyle {
      height: 80%;
      display: flex;
      flex-direction: column;
      place-content: center;
      align-items: center;
    }

    .blue-line {
      height: 2px;
      background-color: #fc8803;
      width: 15%;
      align-self: start;
      margin-left: -3px;
      transition: width 0.75s ease-in-out;
      /* transition: height 0.75s ease-in-out; */
    }

    #quais {
      height: 210px;
      display: flex;
      /* gap: 40px; */
      flex-direction: column;
      place-content: center;
      place-items: center;
    }

    .card-item {
      border-radius: 0.8rem;
    }

    a {
      text-decoration: none;
      font-weight: 500;
      font-family: "Montserrat";
      font-size: 1.6rem;
      color: var(--color-text-title);
    }

    .child {
      margin: 5px;
      width: 32%;
      box-sizing: border-box;
      background-color: var(--color-box-base);
      border-radius: 0.8rem;
      align-content: flex-start;
      text-decoration: none;
      border: 1.5px solid transparent;
    }

    .bigchild {
      margin: 5px;
      width: 100%;
      box-sizing: border-box;
      /* height: 100%; */
      background-color: var(--color-box-base);
      border: 3px solid transparent;
      border-radius: 0.8rem;
      align-content: flex-start;
      text-decoration: none;
      text-align: center;
    }

    .child:hover .blue-line,
    .child:hover .red-line,
    .child:hover .green-line {
      width: calc(100% + 3px);
    }

    .blue,
    .red,
    .green {
      transition: border 1s ease-out;
    }

    .blue:hover {
      /*  background-color: var(--color-primary-dark); */
      border: 1.5px solid #003466;
      /*  border-radius: 0.8rem; */
    }

    .green:hover {
      /*  background-color: var(--color-primary-dark); */
      border: 1.5px solid green;
      /*  border-radius: 0.8rem; */
    }

    .red:hover {
      /*  background-color: var(--color-primary-dark); */
      border: 1.5px solid #bf0c26;
      /*  border-radius: 0.8rem; */
    }

    .bigchild:hover {
      /*  background-color: var(--color-primary-dark); */
      border: 1.5px solid #003466;
      /*  border-radius: 0.8rem; */
    }

    .buttons {
      display: flex;
      flex-wrap: wrap;
      text-align: center;
      justify-content: center;
    }

    .logo_pref_horizontal {
      width: 6vh;
      max-width: 500px;
    }

    .leaflet-popup-content {
      margin: 13px 24px 13px 20px;
      line-height: 1.3;
      font-size: 13px;
      min-height: 1px;
      font-family: 'montserrat';
      color: black;
    }

    .leaflet-control-geocoder-address-context {
      color: black;
    }

    .leaflet-control-geocoder-form input {
      font-size: 15px;
      border: 0;
      background-color: transparent;
      width: 246px;
      font-family: 'montserrat';
      /* color: white; */
    }

    .leaflet-control-geocoder .leaflet-control-geocoder-alternatives a {
      font-size: 15px;
      font-family: 'montserrat';
    }

    li {
      text-align: justify;
    }

    #objstyle {
      /* ALINHAMENTO DO TEXTO DO HEADER */
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .column {
      float: left;
      width: 33.33%;
      padding: 5px;
    }

    .columnimg {
      float: left;
      width: 70.33%;
      padding: 0px;
    }

    #map {
      height: 90%;
      width: 90%;
    }

    .intrucoes-item>ul i {
      color: var(--color-text-base);
      padding-top: 1rem;
      padding-bottom: 0rem;
      padding-right: 0rem;
      font-size: 3.5rem;
      line-height: 1.5rem;
      align-content: flex-start;
      color: #003466;
    }

    #sim,
    #nao {
      text-decoration: none;
      cursor: pointer;
      color: #003466;
      font-size: 15px
    }

    #sim:hover,
    #nao:hover {
      text-decoration: underline;
      color: #0d6efd;
    }

    .page-header {
      height: 30px;
      margin-bottom: -100px;
      /* height: 125px; */
    }

    .leaflet-control-layers-overlays {
      text-align-last: left;
    }

    .wrapper {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      width: 100%;
    }
  </style>
  <style>
    #map {
      width: 90%;
      height: 85%;
      padding: 0;
      margin: 0;
    }

    .webmadewell {
      background-color: white;
    }

    .sample-header {
      /* position: fixed; */
      left: 0;
      top: -30px;
      width: 100%;
      background-image: url("../public/images/lagoa1.jpeg");
      background-position: center;
      background-size: cover;
      background-repeat: no-repeat;
    }

    .sample-header::before {
      content: "";
      /* position: absolute; */
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      background-color: MidnightBlue;
      opacity: 0.3;
    }

    .sample-header-section {
      position: relative;
      padding: 15% 0 10%;
      /* max-width: 640px; */
      margin-left: auto;
      margin-right: auto;
      color: white;
      text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.5);
      font-family: "Montserrat", sans-serif;
    }

    h1 {
      font-weight: 500;
      text-align: center;
    }

    h2 {
      font-weight: 400;
    }

    .sample-section-wrap {
      position: relative;
      background-color: white;
    }

    .sample-section {
      position: relative;
      /* max-width: 640px; */
      margin-left: auto;
      margin-right: auto;
      padding: 40px;
    }

    .divparticipants {
      text-align: center;
    }

    .main-nav {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      margin: 0;
      padding: 0;
      width: 600px;
      height: 150px;
    }

    .main-nav li {
      list-style: none;
      position: absolute;
      width: 200px;
      height: 200px;
      background: #000;
      transform: rotate(45deg);
      transition: 0.5s;
      margin: -100px;
      overflow: hidden;
      opacity: 0.5;
    }

    .main-nav li:hover {
      opacity: 1;
    }

    .main-nav li.item1 {
      top: 0;
      left: 0;
    }

    .main-nav li.item2 {
      bottom: 0;
      left: 25%;
    }

    .main-nav li.item3 {
      top: 0;
      left: 50%;
    }

    .main-nav li.item4 {
      bottom: 0;
      left: 75%;
    }

    .main-nav li.item5 {
      top: 0;
      left: 100%;
    }

    .main-nav li .bg {
      width: 100%;
      height: 100%;
      transform: scale(1.1);
    }

    .main-nav li.item1 .bg {
      background: url(https://imgur.com/ir9l1IJ.jpg);
      background-size: cover;
      background-position: center;
    }

    .main-nav li.item2 .bg {
      background: url(https://imgur.com/fwe8Z9Q.jpg);
      background-size: cover;
      background-position: center;
    }

    .main-nav li.item3 .bg {
      background: url(https://imgur.com/kSoRoDk.jpg);
      background-size: cover;
      background-position: center;
    }

    .main-nav li.item4 .bg {
      background: url(https://imgur.com/sz1BSkB.jpg);
      background-size: cover;
      background-position: center;
    }

    .main-nav li.item5 .bg {
      background: url(https://imgur.com/ara0hoV.jpg);
      background-size: cover;
      background-position: center;
    }

    .lightbox-gallery {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
      margin-bottom: 45px;
    }

    .lightbox-gallery div>img {
      display: block;
      height: 150px;
      width: 200px;
    }

    .lightbox-gallery div {
      margin: 10px;
      flex-basis: 180px;
    }

    @media only screen and (max-width: 480px) {
      .lightbox-gallery {
        flex-direction: column;
        align-items: center;
      }

      .lightbox>div {
        margin-bottom: 10px;
      }
    }

    /*Lighbox CSS*/

    .lightbox {
      display: none;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      position: fixed;
      top: 0;
      left: 0;
      z-index: 20;
      padding-top: 30px;
      box-sizing: border-box;
    }

    .lightbox img {
      display: block;
      margin: auto;
    }

    .lightbox .caption {
      margin: 15px auto;
      width: 50%;
      text-align: center;
      font-size: 1em;
      line-height: 1.5;
      font-weight: 700;
      color: #eee;
    }

    .github-link {
      font-size: 18px;
      color: rgba(255, 255, 255, 0.7);
    }

    .github-link:hover,
    .github-link:active,
    .github-link:visited {
      color: #fff;
      text-decoration: none;
    }

    .card-img,
    .card-img-top {
      height: 250px;
    }
    .card-text{
      font-size: 1.3rem;
    }
    .col-form-label {
    padding-top: calc(0.375rem + 1px);
    padding-bottom: calc(0.375rem + 1px);
    margin-bottom: 0;
    font-size: 2rem;
    line-height: 1.5;
}
.form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1.5rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
  </style>
  <title></title>
</head>

<body id="page-instrucoes">
  <header class="page-header">
    <!-- header menu local load -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="https://kit.fontawesome.com/493360b702.js" crossorigin="anonymous"></script>
    <div class="top-bar-container-2" style="height: 30px;">

      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: white;">
        <div class="logo-title">
          <a>
            <img class="logo_pref_horizontal" src="../public/images/Screenshot_62-removebg-preview.png" alt="">
          </a>
        </div>
        <div class="container-fluid" style="text-align:center;display:inline-block;position:relative;text-align: -webkit-center;">
          <button class="navbar-toggler" type="button" id="nav-button">
            <span class="navbar-toggler-icon"></span>
          </button>
          <!-- <div> -->
          <div class="navbar-collapse justify-content-center" id="navbarNavDropdown">
            <ul class="navbar-nav" style="gap: 25px;">
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Inicio</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle show" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                  <b class="first-link">Institucional</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Projetos</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Publicações e Eventos</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Trabalho de Campo</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Relatórios</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Parceiros</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Notícias</b></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link buttonlink-drop" href="../index.html" id="navbarDropdownMenuLink" role="button" style="white-space:nowrap;">
                  <b class="first-link">Fale Conosco</b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>

    <!--  <script src="http://redeplanejamento.pmf.sc.gov.br/public/scripts/mobile-nav-bar-active.js" defer></script> -->
  </header>
  <div class="sample-header">
    <div class="sample-header-section">
      <h1>PROJETOS</h1>
    </div>
  </div>

  <div id="portfolio">

    <div class="container mt-3">
      <div style="width: 20%;">
        <button class="btn btn-block btn-success " data-toggle="modal" data-target="#modaladd" style="font-size: 1.35rem;">
          Adicionar Novo Projeto
          <div class="ripple-container"></div>
        </button>
      </div>
      <div class="row">
        <div class="col-lg-4 mt-4">
          <div class="card">
            <img class="card-img-top" src="../public/images/lagoa2.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">Projeto 1</h4>
              <p class="card-text">Descrição do Projeto.</p>
              <div class="text-center">
                <button class="btn btn-block btn-success " data-toggle="modal" data-target="#myModal" style="font-size: 1.22rem;">
                  Mais Informações
                  <div class="ripple-container"></div>
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 mt-4">
          <div class="card portfolioContent">
            <img class="card-img-top" src="../public/images/lagoa3.jpg" alt="Card image" style="width:100%">
            <div class="card-body">
              <h4 class="card-title">Projeto 2</h4>
              <p class="card-text">Descrição do Projeto.</p>
              <div class="text-center">
                <button class="btn btn-block btn-success " data-toggle="modal" data-target="#myModal" style="font-size: 1.22rem;">
                  Mais Informações
                  <div class="ripple-container"></div>
                </button>
              </div>
            </div>
          </div>
        </div>
        <?php
        $selectalteracoes = "SELECT * FROM projetos.editorprojetos";
        $resultado_selectalteracoes = $conn->query($selectalteracoes);
        $resultado_selectalteracoes_count = $resultado_selectalteracoes->rowCount();
        while ($row = $resultado_selectalteracoes->fetch()) {
            $capamanual = $row['capamanual'];
            $descompleta = $row['descompleta'];
            $descinicial = $row['descinicial'];
            $titulo = $row['titulo'];
            $id = $row['id'];
            echo '<div class="col-lg-4 mt-4">
            <div class="card portfolioContent">
              <img class="card-img-top" src="imagesmanual/'.$capamanual.'" alt="Card image" style="width:100%">
              <div class="card-body">
                <h4 class="card-title">'.$titulo.'</h4>
                <p class="card-text">'.$descinicial.'</p>
                <div class="text-center">
                <button class="btn btn-block btn-success " data-toggle="modal" data-target="#'.$id.'" style="font-size: 1.22rem;">
                  Mais Informações
                  <div class="ripple-container"></div>
                </button>
              </div>
              </div>
            </div>
          </div>
          <div class="modal fade bd-example-modal-lg" id="'.$id.'" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">'.$titulo.'</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                </button>


              </div>
              <div class="modal-body">
                <img class="card-img-top" src="imagesmanual/'.$capamanual.'" alt="Card image" style="width:100%">
                <p style="font-size: 2rem;margin-top: 1rem;">'.$descompleta.'
                </p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>';
          
          }
        ?>
        <div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Projeto 1</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                </button>


              </div>
              <div class="modal-body">
                <img class="card-img-top" src="../public/images/lagoa2.jpg" alt="Card image" style="width:100%">
                <p style="font-size: 2rem;margin-top: 1rem;">Descrição Completa do Projeto
                </p>
              </div>
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-link">Nice Button</button> -->
                <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade bd-example-modal-lg" id="modaladd" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Adicionar Conteúdo de Novo Projeto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="material-icons">clear</i>
                </button>


              </div>
              <div class="modal-body">
                <form action="addproject.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Título do Projeto:</label>
                    <input type="text" class="form-control" id="recipient-name" name="titulo" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="descricaoinicial" class="col-form-label">Descrição Inicial do Projeto:</label>
                    <textarea class="form-control" id="descricaoinicial" name="descini"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="descricaocompleta" class="col-form-label">Descrição Completa do Projeto:</label>
                    <textarea class="form-control" id="descricaocompleta" name="descfinal"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="image" class="col-form-label">Imagem do Projeto:</label>
                    <input accept="image/*" type='file' id="image" name="imageprojeto" />
                  </div>


              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-link">Salvar</button>
                <button type="button" class="btn btn-link" data-dismiss="modal">Fechar</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!--   <div class="col-lg-4 mt-4">
                <div class="card portfolioContent">
                    <img class="card-img-top" src="images/portfolioImage3.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Product Landing Page</h4>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-success">Link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div class="card portfolioContent">
                    <img class="card-img-top" src="images/portfolioImage4.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Messaging Service</h4>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-success">Link</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="card portfolioContent">
                    <img class="card-img-top" src="images/portfolioImage1.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Twitter Clone</h4>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-success">Link</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="card portfolioContent">
                    <img class="card-img-top" src="images/portfolioImage4.jpg" alt="Card image" style="width:100%">
                    <div class="card-body">
                        <h4 class="card-title">Blog App</h4>
                        <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <div class="text-center">
                            <a href="#" class="btn btn-success">Link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div> -->
        <!-- <div id="box"></div> -->

        <!-- <div class="buttons" style="margin-top: 115px;">
                    
    
    <div class="child blue">
        <a href="Conselhos/">
            <article class="card-item">
                <div id="quais">
                    <div class="blue-line"></div>
                    <div class="insidestyle">
                        <header>
                            <strong class="portugues bigletter">Legislação</strong>
                        </header>
                    </div>

                </div>
            </article>
        </a>
    </div>
    <div class="child blue">
        <a href="Instrumentos e Incentivos/">
            <article class="card-item">
                <div id="quais">
                    <div class="blue-line"></div>
                    <div class="insidestyle">
                        <header>
                            <strong class="portugues bigletter">Mapa Disponível ao Público</strong>
                        </header>
                    </div>

                </div>
            </article>
        </a>
    </div>
   






</div> -->
      </div>
</body>

</html>
<script>
  (function() {
    var $lightbox = $("<div class='lightbox'></div>");
    var $img = $("<img>");
    var $caption = $("<p class='caption'></p>");

    // Add image and caption to lightbox

    $lightbox
      .append($img)
      .append($caption);

    // Add lighbox to document

    $('body').append($lightbox);

    $('.lightbox-gallery img').click(function(e) {
      e.preventDefault();

      // Get image link and description
      var src = $(this).attr("data-image-hd");
      var cap = $(this).attr("alt");

      // Add data to lighbox

      $img.attr('src', src);
      $caption.text(cap);

      // Show lightbox

      $lightbox.fadeIn('fast');

      $lightbox.click(function() {
        $lightbox.fadeOut('fast');
      });
    });

  }());

  /*  function parallax_height() {
     var scroll_top = $(this).scrollTop();
     console.log
     var sample_section_top = $(".sample-section").offset().top;
     var header_height = $(".sample-header-section").outerHeight();
     $(".sample-section").css({
       "margin-top": header_height
     });
     $(".sample-header").css({
       height: header_height - scroll_top
     });
   }
   parallax_height();
   $(window).scroll(function() {
     parallax_height();
   });
   $(window).resize(function() {
     parallax_height();
   }); */
</script>
<script>
  $(function() {
    var includes = $('[data-include]')
    $.each(includes, function() {
      var file = '../views/' + $(this).data('include') + '.php'
      $(this).load(file)
    })
  })

  // validar form 01 - pedido de incentivo e termo declaratorio
  $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
  });
</script>