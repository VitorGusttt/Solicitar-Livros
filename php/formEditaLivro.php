<?php
    include('../layouts/header.html');
    require('actions/functions.php');
    session_start();
    include('conexaoBD.php');
    
    $idLivro = $_GET['id'];

    $sql = "SELECT * FROM livro WHERE idLivro = $idLivro";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
        echo "
            <body>
                <div class='formulario'>
                    <form action='../php/editaLivro.php'  method='post' enctype='multipart/form-data'>

                        <label for='nomeLivro'>Nome do Livro:</label>
                        <input type='text' name='nomeLivro' id='nomeLivro' value = '$row[nomeLivro]'>

                        <label for='autorLivro'>Autor do Livro:</label>
                        <input type='text' name='autorLivro' id='autorLivro' value = '$row[autorLivro]'>

                        <label for='editoraLivro'>Editora:</label>
                        <input type='text' name='editoraLivro' id='editoraLivro' value = '$row[editoraLivro]'>

                        <label for='dataLivro'>Data da publicação:</label>
                        <input type='date' name='dataLivro' id='dataLivro' value = '$row[dataLivro]'>

                        <label for='linkLivro'>Link para compra do livro:</label>
                        <input type='text' name='linkLivro' id='linkLivro' >

                        <label for='categoriaLivro'>Categoria Livro:</label>
                        <select name='categoriaLivro' id='categoriaLivro'>
                            <option value='Literatura'>Literatura</option>
                            <option value='docente'>Didático</option>
                        </select>

                        <label for='idLivro'>ID:</label>
                        <input type='text' name='idLivro' id='idLivro' value = '$row[idLivro] ' readonly'>

                        <button type='submit'>Editar Livro</button>
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

    
?>