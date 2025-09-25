<?php

//Definir fuso horário
date_default_timezone_set('America/Sao_Paulo');

//dados conexão bd local
$servidor = 'localhost';
$banco = 'nexgest';
$usuario = 'root';
$senha = '';

try {
$pdo = new PDO(dsn: "mysql:dbname=$banco;host=$servidor;charset=utf8", username: "$usuario", password: "$senha");
} catch (PDOException $e) {
    echo 'Erro ao conectar ao banco de dados!';
    echo $e;
}

//variaveis globais
$nome_sistema = 'Nome Sistema';
$email_sistema = 'samuel.rodrigues1991@hotmail.com';
$telefone_sistema = '(17)99664-9882';

?>