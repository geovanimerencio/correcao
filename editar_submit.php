<?php
include 'contatos.class.php';

$contato = new contato();

if(!empty($_POST['id'])) {
    $nome = $_POST['nome'];
    $id = $_POST['id'];

    $contato->editar($nome,$id);

    header("Location: index.php");
}