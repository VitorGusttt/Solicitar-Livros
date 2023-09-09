<?php

    session_start();
    require ('../layouts/header.html');
    require ('actions/functions.php');
    $emailFornecido = $senhaFornecida = '';


    $emailFornecido = verificaCampos('emailUsuario', $emailFornecido, 'erro', 'Email eh obrigatorio');
    $senhaFornecida = verificaCampos('senhaUsuario', $senhaFornecida, 'erro', 'Senha eh obrigatorio');
    $senhaFornecida = md5($senhaFornecida);

    require ('conexaoBD.php');

    if ($ok){
        $sql = "SELECT emailUsuario, senhaUsuario FROM usuario";
        $resultados = $conn->query($sql);
        $emailEstaNoBD = FALSE;
        //enquanto houver resultado:
        while($dadosPorLinha = mysqli_fetch_assoc($resultados))
        {
    
    
            $emailCadastrado = $dadosPorLinha['emailUsuario'];
            $senhaCadastrada = $dadosPorLinha['senhaUsuario'];
    
            if ($emailFornecido == $emailCadastrado){
                $emailEstaNoBD = TRUE;
    
                if ($senhaFornecida == $senhaCadastrada){
                    mostraMsg('ok', 'Login feito com sucesso!');
                    $_SESSION['email'] = $emailFornecido;
                    $_SESSION['senha'] = $senhaFornecida;
                    break;
                }
                else{
                    mostraMsg('erro', 'Senha Incorreta');
                };
            }
            else{
                mostraMsg('erro', 'Email nao cadastrado');
            };
        }
    
    }


?>

