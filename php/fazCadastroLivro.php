<?php
    include ('../layouts/header.html');
    include_once ('actions/functions.php');
    session_start();


    //variaveis
    $nomeLivro = $editoraLivro = $dataLivro = $categoriaLivro = $autorLivro = $linkLivro = '';

    $nomeLivro = verificaCampos('nomeLivro', $nomeLivro, 'erro', 'Nome eh obrigatorio');
    $autorLivro = verificaCampos('autorLivro', $autorLivro, 'erro', 'Autor eh obrigatorio');
    $editoraLivro = verificaCampos('editoraLivro', $editoraLivro, 'erro', 'Editora eh obrigatorio');
    $dataLivro = verificaCampos('dataLivro', $dataLivro, 'erro', 'Data eh obrigatorio');
    $categoriaLivro = verificaCampos('categoriaLivro', $categoriaLivro, 'erro', 'Categoria eh obrigatorio');
    $linkLivro = verificaCampos('linkLivro', $linkLivro, 'erro', 'Link eh obrigatorio');
    $emailUsuarioAdc = $_SESSION['email'];
    
    if($ok){
        require ('conexaoBD.php');
        $sql = "INSERT INTO livro VALUES (DEFAULT, '$nomeLivro', '$categoriaLivro', '$autorLivro', '$editoraLivro', '$dataLivro', '$emailUsuarioAdc')";

        if($conn->query($sql)){
            mostraMsg('ok', "Cadastrado com sucesso!");            
        }   
        else{
            mostraMsg('erro', 'Ocorreu um erro ao cadastrar, tente novamente');
        };
    }


?>