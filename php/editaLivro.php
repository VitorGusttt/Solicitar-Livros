<?php
    include('../layouts/header.html');
    require('actions/functions.php');
    session_start();
    include('conexaoBD.php');
    
    $nomeLivro = $_POST['nomeLivro'];
    $autorLivro = $_POST['autorLivro'];
    $editoraLivro = $_POST['editoraLivro'];
    $categoriaLivro = $_POST['categoriaLivro'];
    $idLivro = $_POST['idLivro'];

    $sql = "UPDATE livro
    SET
    nomeLivro = '$nomeLivro',
    autorLivro = '$autorLivro',
    editoraLivro = '$editoraLivro',
    categoriaLivro = '$categoriaLivro'
    WHERE idLivro = $idLivro";

    if($conn->query($sql)){
        mostraMsg('ok', "Editado com sucesso!");
    };


?>