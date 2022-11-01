<?php
//Credenciais de acesso ao BD
/* include_once 'conexao.php'; */
$content = $_REQUEST['content'];
$content = json_decode($content);
var_dump($content->data->content);

/* $data = json_decode(file_get_contents('php://input'), true);
print_r($data);
echo $data["content"]; */
