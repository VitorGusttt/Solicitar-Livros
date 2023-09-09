<?php
    include ('../layouts/header.html');
    include_once ('actions/functions.php');

    //variaveis
    $nomeUsuario = $cpfUsuario = $emailUsuario = $senhaUsuario = $categoriaUsuario = '';

    $nomeUsuario = verificaCampos('nomeUsuario', $nomeUsuario, 'erro', 'Nome eh obrigatorio');
    $cpfUsuario = verificaCampos('cpfUsuario', $cpfUsuario, 'erro', 'Cpf eh obrigatorio');
    $emailUsuario = verificaCampos('emailUsuario', $emailUsuario, 'erro', 'Email eh obrigatorio');
    $senhaUsuario = verificaCampos('senhaUsuario', $senhaUsuario, 'erro', 'Senha eh obrigatorio');
    $senhaUsuario = md5($senhaUsuario);
    $categoriaUsuario = verificaCampos('categoriaUsuario', $categoriaUsuario, 'erro', 'Categoria eh obrigatorio');

    if($ok){
        require ('conexaoBD.php');
        
        $sql = "INSERT INTO usuario VALUES ('$cpfUsuario', '$emailUsuario', '$nomeUsuario', '$categoriaUsuario', '$senhaUsuario')";

        if($conn->query($sql)){
            mostraMsg('ok', "Cadastrado com sucesso!");
        }
        else{
            mostraMsg('erro', 'Ocorreu um erro ao cadastrar, tente novamente');
        };
    }

?>