<?php

//Credenciais de acesso ao BD
include_once 'conexao.php';
$content = $_REQUEST['content'];
$content = json_decode($content);
var_dump($content->data->content);
$camada = $content->data->camadaadicionada;
$data_cadastro = date("Y-m-d H:i:s");
$selectalteracoes = "INSERT INTO projetos.layers (layername, datacadastro) VALUES('$camada', '$data_cadastro');";
$resultado_selectalteracoes = $conn->query($selectalteracoes);
