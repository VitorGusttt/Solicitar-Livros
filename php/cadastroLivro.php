<?php 
    session_start();

    require('../layouts/header.html');
    require('actions/functions.php');

    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
        require('../layouts/formCadastroLivro.html');
    }
    else{
        mostraMsg('erro', 'Voce precisa estar logado para cadastrar livros');
        require('../layouts/formLogin.html');
    };
?>