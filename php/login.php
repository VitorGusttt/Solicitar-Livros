<?php 
    include('../layouts/header.html');
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
        include('../layouts/listaLivrosConta.html');
        
    }
    else{
        include('../layouts/formLogin.html');

    };
?>