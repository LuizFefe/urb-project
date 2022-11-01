<?php

include_once 'conexao.php';
date_default_timezone_set('America/Sao_Paulo');
date_default_timezone_set("America/Sao_Paulo");
//viagem
$titulo = $_POST['titulo'];
$descini = $_POST['descini'];
$descfinal = $_POST['descfinal'];
/* $imageprojeto = $_POST['imageprojeto']; */
/* $imageprojeto = $_POST['imageprojeto']; */
$data_cadastro = date("Y-m-d H:i:s");

/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
set_time_limit(0);
/* $servidor_ftp = '200.192.64.13';
$usuario_ftp = 'sistemas_www';
$senha_ftp   = 'smpu#2021';
$path = 'mobilidade/uploadguiasemanuais/documento/';


if (!isset($_FILES['upmanual'])) {
  exit('Nenhum arquivo enviado! Upload Manual');
}

$upmanual = $_FILES['upmanual'];
$upmanual_tipo = $titulomanual . 'upmanual';
$upmanual_obs = $titulomanual . 'upmanual';
$codigo_registro = md5($data_criado . substr(md5(mt_Rand()), 0, 4));
$filename = $titulomanual . '.' . $codigo_registro;


$nome_arquivoupmanual = $upmanual['name'];
$tamanho_arquivoupmanualr = $upmanual['size'];
$arquivo_tempupmanual = $upmanual['tmp_name'];
$arquivo_pathupmanual = $path . $filename . '.pdf';
$arquivo_nomeupmanual = $filename . '.pdf';
$conexao_ftp = ftp_connect($servidor_ftp);
$login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);

if (!$login_ftp) {
  exit('Usuário ou senha FTP incorretos.');
}

if (@ftp_put($conexao_ftp, $arquivo_pathupmanual, $arquivo_tempupmanual, FTP_BINARY)) {
} else {
  exit('Erro ao enviar arquivo, tente novamente mais tarde');
} */
/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
set_time_limit(0);
$servidor_ftp = 'ftp.urbanlogics.com.br';
$usuario_ftp = 'urbanlogics1';
$senha_ftp   = 'Urblog123456789@';
$path = 'public_html/urb/MapaInterativo/imagesmanual/';


if (!isset($_FILES['imageprojeto'])) {
  exit('Nenhum arquivo enviado! Upload Manual');
}

$imageprojeto = $_FILES['imageprojeto'];
$imageprojeto_tipo = $titulo . 'imageprojeto';
$imageprojeto_obs = $titulo . 'imageprojeto';
$codigo_registro = md5($data_cadastro . substr(md5(mt_Rand()), 0, 4));
$filename = $titulo . '.' . $codigo_registro;


$nome_arquivoimageprojeto = $imageprojeto['name'];
$tamanho_arquivoimageprojetor = $imageprojeto['size'];
$arquivo_tempimageprojeto = $imageprojeto['tmp_name'];
$arquivo_pathimageprojeto = $path . $filename . '.jpg';
$arquivo_nomeimageprojeto = $filename . '.jpg';
$conexao_ftp = ftp_connect($servidor_ftp);
$login_ftp = @ftp_login($conexao_ftp, $usuario_ftp, $senha_ftp);

if (!$login_ftp) {
  exit('Usuário ou senha FTP incorretos.');
}

if (@ftp_put($conexao_ftp, $arquivo_pathimageprojeto, $arquivo_tempimageprojeto, FTP_BINARY)) {
} else {
  exit('Erro ao enviar arquivo, tente novamente mais tarde');
}
/*-------LICENCIAMENTO-------------------------LICENCIAMENTO-----------------------LICENCIAMENTO-------------------------*/
$sql = "INSERT INTO projetos.editorprojetos
   (titulo, descinicial, descompleta, datacadastro,capamanual)
   VALUES
   (:titulo, :descinicial, :descompleta, :datacadastro,:capamanual);";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':titulo', $titulo);
$stmt->bindValue(':descinicial', $descini);
$stmt->bindValue(':descompleta', $descfinal);
$stmt->bindValue(':datacadastro', $data_cadastro);
$stmt->bindValue(':capamanual', $arquivo_nomeimageprojeto);
$stmt->execute();
$count = $stmt->rowCount();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
</head>

<body>
  <?php
  if ($count != 0) {

    echo "
          <html>
          <head>    
          <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'>      
          <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
          <style>
          .swal2-popup {
            font-size: 20px !important;
            border-radius: 25px;
            } 
        </style>
          <script>Swal.fire({
            title: 'Projeto Adicionado com Sucesso!',
            icon: 'success',
            confirmButtonText: 'Ok'
          })
          </script>
          </head>
          <body style='background-color:#white';>       
          </body>
          </html>
          <META HTTP-EQUIV=REFRESH CONTENT = '5;URL=projetos.php'>";
  } ?>
</body>

</html>