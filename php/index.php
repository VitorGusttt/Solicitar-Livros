<?php 
    include('../layouts/header.html');
    include('actions/functions.php');
?>

<main>

    <?php


        require('conexaoBD.php');

        $sql = "SELECT * FROM livro";
        $result = $conn->query($sql);
        mostraLivros($result, "fa-solid fa-thumbs-up", "fa-solid fa-thumbs-down");
    ?>
<script src="../js/buscaCapaLivro.js"></script>
</main>
