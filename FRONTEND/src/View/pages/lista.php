<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuarios:</title>
</head>
<body>
    <h1>LISTA DE USUARIOS CADASTRADOS:</h1>
<html>

<?php
require ("vendor/autoload.php");
use Controller\controller;

$getposts = new controller();
$posts = $getposts-> lista();


echo $posts;
?>

