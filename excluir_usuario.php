<?php

$db = new SQLite3("banco.db");

#echo isset($_REQUEST["botao_2"]) ? 'true': 'false';

$i = 1;
while(true){
    if(isset($_REQUEST["botao_$i"])){
        $email = $_REQUEST["botao_$i"];
        break;
    }else $i++;
}

$db->query("DELETE FROM usuarios WHERE email= '$email'");

header("location: lista_usuarios.php");
exit;