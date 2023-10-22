<?php 
    include('../layouts/header.html');
    require('actions/functions.php');
    session_start();

    if(isset($_SESSION['email']) && isset($_SESSION['senha'])){
        $emailUser = $_SESSION['email'];
        
        include('conexaoBD.php');

        echo "<main>";

        $pegaNome = "SELECT * FROM usuario WHERE emailUsuario LIKE '$emailUser'";   
        $resultado = $conn->query(($pegaNome));

        if ($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
                $nomeU = $row['nomeUsuario'];
                echo "
                    <div class='header-conta'>
                        <h2>$nomeU</h2>
                        <a href = 'logout.php'>Sair da conta</a>
                    </div>


                ";

                };
        };

        $emailPedido = $_SESSION['email'];
                
        $sql = "SELECT * FROM livro WHERE emailPedido = '$emailPedido'";
        $result = $conn->query($sql);   
        if ($result->num_rows > 0) {
            mostraMsg('resultados-zero', "$result->num_rows livro(s) encontrado(s) !");

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
                    <a href = 'formEditaLivro.php?id=$row[idLivro]'><i class='fa-solid fa-pen link_livro'></i></a>
                    <a href = 'apagaLivro.php?id=$row[idLivro]' ><i class='fa-solid fa-trash link_livro'></i></a>
                </div>
    
            </div>
            ";
            }
        }
        else 
            {
                mostraMsg('resultados-zero', 'Nenhum livro cadastrado!');
            };

        echo "</main>";
        
    }
    else{
        include('../layouts/formLogin.html');

    };

    echo"<script src='../js/buscaCapaLivro.js'></script>";

?>