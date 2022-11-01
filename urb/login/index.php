<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="SMPU Login">
    <meta name="author" content="Michel Mittmann">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bas/js/javascriptpersonalizado.js"></script>
    <script type="text/javascript" src="bas/js/javascript_frota.js"></script>
    <script src="bas/js/sorttable.js"></script>
    <script type="text/javascript" src="<?php dirname(__FILE__) . 'bas/js/jquery.quick.search.js'; ?>"></script>
    <script type="text/javascript" src="<?php dirname(__FILE__) . '/cidadao/moradores_costa/js/jquery.js'; ?>">
    </script>
    <script src="bas/js/formrules.js"></script>
    <script src="bas/js/cep.js"></script> <!-- análise de CEP !-->
    <script src="bas/js/masks.js"></script> <!-- máscaras para input formularios !-->
    <script type="text/javascript" src="bas/js/jquery.mask.min.js"></script>
    <script src="https://compressjs.herokuapp.com/compress.js"></script>
    <link rel="stylesheet" href="../public/styles/main.css">
    <link rel="stylesheet" href="../public/styles/partials/header.css">
    <link rel="stylesheet" href="../public/styles/partials/page-instrucoes.css">
    <link rel="stylesheet" href="../public/styles/partials/page-index.css">
    <link rel="stylesheet" href="../public/styles/footer.css">
    <link rel="stylesheet" href="css/page-login.css">
    <link rel="stylesheet" href="css/forms.css">
    <script>
        $(document).ready(function() {
            $("#smpu_topo").load("bas/smpu_topo.php");
            $("#smpu_rodape").load("bas/smpu_rodape.php");
        });
    </script>


    <style>
        #page-login .footerlogin {
            padding: 40px 54px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        #page-login main .footerlogin button,
        #page-login main .footerlogin a {
            width: 100%;
            height: 4rem;
            background: var(--color-secondary);
            color: var(--color-button-text);
            border: 0;
            border-radius: 0.8rem;
            cursor: pointer;
            font: 700 1.6rem Montserrat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: 0.2s;
            margin-top: 3.2rem;
            margin-top: 0;
            margin-bottom: 2em;
            width: 300px;
        }

        #page-login main .footerlogin .cadastro {
            background: #003466;
        }
    </style>






    <title>Acesso Interno</title>
    <!--  <link href="css/signin.css" rel="stylesheet"> -->
</head>
<header class="page-header">
    <!-- header menu local load -->
    <div data-include="headermenu_ipuf"></div>
    <div class="header-content">
        <strong>Acesso Interno</strong>
    </div>
</header>

<body id="page-login">

    <!-- <form class="form-signin" method="POST" action="session_valida.php">
            <h2 class="form-signin-heading">Área Restrita</h2>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
            <label for="inputPassword" class="sr-only">Senha</label>
            <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Acessar</button>
            <button type="button" class="btn btn-lg  btn-success btn-block" data-toggle="modal" data-target="#MODALuser_cadastrar">
                Cadastrar Usuário
            </button>
        </form> -->
    <main>
        <form method="post" id="loginform" action="session_valida.php">
            <fieldset id="cadastro_contratantes" class="div-show" style="display: block;">
                <legend></legend>
                <div class="login_show" id="login_show" style="display: block;">
                    <span id="msg-error-contratantes"></span>
                    <div class="input-block">
                        <label class="portugues" for="operador_login_email"><strong>Email</strong></label>
                        <input type="text" class="form-control" name="email" id="operador_login_email" aria-describedby="operador_login_email_helpId" placeholder="email@mail.com">
                        <small id="operador_login_email_helpId" class="form-text text-muted">
                        </small>
                        <small id="operador_login_email_msg" class="small-message"></small>
                    </div>
                    <div class="input-block">
                        <label class="portugues" for="operador_cep"><strong>Senha</strong></label>
                        <input type="password" class="form-control" name="senha" id="operador_login_senha" aria-describedby="operador_login_senha_helpId" placeholder="">
                        <small id="operador_login_senha_helpId" class="form-text text-muted">
                            <div class="portugues">Senha de acesso</div>
                        </small>
                        <small id="operador_login_senha_msg" class="small-message"></small>
                    </div>
                </div>
            </fieldset>

            <div class="footerlogin">
                <div>
                    <button id="logar_operador_db">
                        <div class="portugues">Acessar</div>
                    </button>
                </div>
                <div>
                    <button type="button" class="btn btn-lg  btn-success btn-block cadastro" data-toggle="modal" data-target="#MODALuser_cadastrar">
                        Cadastrar Usuário
                    </button>
                </div>
            </div>
        </form>
    </main>
    <p class="text-center text-danger">
        <?php if (isset($_SESSION['loginErro'])) {
            echo $_SESSION['loginErro'];
            unset($_SESSION['loginErro']);
        } ?>
    </p>
    <p class="text-center text-success">
        <?php
        if (isset($_SESSION['logindeslogado'])) {
            echo $_SESSION['logindeslogado'];
            unset($_SESSION['logindeslogado']);
        }
        ?>
    </p>
    <!-- MODAL CADASTRAR --><?php include_once("user/user_formulario.php"); ?>
    <div data-include="FOOTER"></div>
    <script src="user/user_formulario.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
</body>
<script>
    // le arquivos externos da pagina


    $(function() {
        var includes = $('[data-include]')
        $.each(includes, function() {
            var file = '../public/views/' + $(this).data('include') + '.php'
            $(this).load(file)
        })
    })


    // validar form 01 - pedido de incentivo e termo declaratorio
</script>

</html>