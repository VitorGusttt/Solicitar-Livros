<?php
$ok = true;
// <!-- aqui fica as funcoess -->
    function mostraMsg($classe, $texto){
        echo "
            <div class ='msg $classe'>
                <h3>$texto</h3>
            </div>
        ";
    };


    function verificaCampos($campoDesejado, $nomeVariavel, $classe, $texto) {
        global $ok;
        //verifica se o campo esta vazio
        if(!empty($_POST[$campoDesejado]))
        {
            $nomeVariavel = $_POST[$campoDesejado];
            $nomeVariavel = stripslashes($nomeVariavel);
            $nomeVariavel = trim($nomeVariavel);
            $nomeVariavel = htmlspecialchars($nomeVariavel);
            return $nomeVariavel;
        }

        else{
            mostraMsg($classe, $texto);
            return $ok = false;
        };

    };

    function mostraLivros($resultado, $icon1, $icon2){
        if ($resultado->num_rows > 0) {
            mostraMsg('resultados-zero', "$resultado->num_rows livros encontrados !");

            while($row = $resultado->fetch_assoc()) {
            echo "
            <div class='caixaLivro'>
                <img src='#' alt='$row[nomeLivro]' class='capaLivro'>
                <div class='infoLivro'>
                    <h3 class='nomeLivro'>$row[nomeLivro]</h3>
                    <h4>$row[autorLivro]</h4>
                    <h4>$row[editoraLivro]</h4>
                </div>
        
                <div class='avaliaLivro'>
                    <i class='$icon1'></i>
                    <i class='$icon2'></i>
                </div>
    
            </div>
            ";
            }
        }
        else 
            {
                mostraMsg('resultados-zero', 'Nenhum livro cadastrado!');
            };
    }

    //seleciona dados
    function deleta($conn, $qualTabela, $onde, $parametro){
        
        $sql = "DELETE FROM $qualTabela WHERE $onde = '$parametro'";
        if($conn->query($sql)){
            header("Location: index.php");
        };

    };

    function edita($conn, $qualTabela, $onde, $parametro){
        $sql = "SELECT * FROM $qualTabela WHERE $onde = '$parametro'";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            while($row = $resultado->fetch_assoc()) {
            echo "
                <body>
                    <div class='formulario'>
                        <form action='../php/fazCadastroLivro.php'  method='post' enctype='multipart/form-data'>

                            <label for='nomeLivro'>Nome do Livro:</label>
                            <input type='text' name='nomeLivro' id='nomeLivro' placeholder = '$row[nomeLivro]'>

                            <label for='autorLivro'>Autor do Livro:</label>
                            <input type='text' name='autorLivro' id='autorLivro' placeholder = '$row[autorLivro]'>

                            <label for='editoraLivro'>Editora:</label>
                            <input type='text' name='editoraLivro' id='editoraLivro' placeholder = '$row[editoraLivro]'>

                            <label for='dataLivro'>Data da publicação:</label>
                            <input type='date' name='dataLivro' id='dataLivro' placeholder = '$row[dataLivro]'>

                            <label for='linkLivro'>Link para compra do livro:</label>
                            <input type='text' name='linkLivro' id='linkLivro' >

                            <label for='categoriaLivro'>Categoria Livro:</label>
                            <select name='categoriaLivro' id='categoriaLivro'>
                                <option value='Literatura'>Literatura</option>
                                <option value='docente'>Didático</option>
                            </select>

                            <button type='submit'>editar Livro Livro</button>
                        </form>
                        
                    </div>

                </body>
            ";
            }
        }
        else 
            {
                mostraMsg('resultados-zero', 'Nenhum livro cadastrado!');
            };

    }
?>