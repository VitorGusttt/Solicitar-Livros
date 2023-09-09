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
?>