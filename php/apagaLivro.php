<?php
    require('actions/functions.php');
    session_start();
    include('conexaoBD.php');
    
    $idLivro = $_GET['id'];
    
    $result = deleta($conn,'livro', 'idLivro', $idLivro);

    
    
?>