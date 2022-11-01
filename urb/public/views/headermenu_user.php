<?php
session_start();
if (!isset($_SESSION['usuarioId'])) {
    echo "analise de secao - nao encontrado";
    $_SESSION['logindeslogado'] = "<b>Login Obrigatório</b>";
    //redirecionar o usuario para a página de login
    header("Location: /login/index.php");
    //header("Location: index.php");
    exit; // Encerra a execução do script
} else

if ($_SESSION['usuarioNivelacesso'] = "9") {
$nivel_acesso = "SuperUsuário";
} 

elseif ($_SESSION['usuarioNivelacesso'] = "12") {
    $nivel_acesso = "Editor";

    }

else

$nivel_acesso = "Definir";
?>

<div class="p-2 mb-2 bg-primary text-white">
    <div class="row">
        <div class="col">
            <b>Usuario:</b> <?php echo $_SESSION['usuarioNome'] . "<b>  Nível de acesso: </b>" . $nivel_acesso;?>
        </div>
    
        <div class="col col-md-auto">
            <a class="btn btn-outline-light btn-sm" href="/login/painel_administrativo.php" role="button">Painel</a>
            <a class="btn btn-outline-light btn-sm" href="/login/sair.php" role="button">Sair</a>
        </div>
    </div>
</div>


<div class="top-bar-container" style="position: fixed">
    <nav class="navbar">
        <div class="logo-title">
            <a href="./">
                <img class="logo_selo_horizontal" src="http://ipuf.pmf.sc.gov.br/public/images/logo.svg" alt="">
            </a>
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <ul class="navbar-links">
            <li>
                <a href="" target="_blank"></a>
            </li>
            <li>
                <a href="" target="_blank"></a>
            </li>
        </ul>
    </nav>
</div>



