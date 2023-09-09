<?php 
    include('../layouts/header.html');
    include('actions/functions.php');
?>

<main>

    <?php


        require('conexaoBD.php');

        $sql = "SELECT * FROM livro";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            mostraMsg('resultados-zero', "$result->num_rows livros encontrados !");

            while($row = $result->fetch_assoc()) {
            echo "
            <div class='caixaLivro'>
                <img src='#' alt='$row[nomeLivro]' class='capaLivro'>
                <div class='infoLivro'>
                    <h3 class='nomeLivro'>$row[nomeLivro]</h3>
                    <h4>$row[autorLivro]</h4>
                    <h4>$row[editoraLivro]</h4>
                </div>
        
                <div class='avaliaLivro'>
                    <i class='fa-solid fa-thumbs-up'></i>
                    <i class='fa-solid fa-thumbs-down'></i>
                </div>
    
            </div>
            ";
            }
        }
        else 
            {
                mostraMsg('resultados-zero', 'Nenhum livro cadastrado!');
            };
    ?>
<script src="../js/buscaCapaLivro.js"></script>
</main>
