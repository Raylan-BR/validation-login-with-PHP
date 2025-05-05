<?php

$email = $_REQUEST["email"];
$senha = $_REQUEST["senha"];

/*//criação de uma classe para manipular o banco de dados
class Mydb extends SQLite3{
    //construtor da classe
    public function __construct(){
        //aqui, um arquivo banco.db é iniciado ou criado
        $this->open("banco.db");
    }
} */
//declaração e inicialização de uma variavel do tipo SQLite3
$db = new SQLite3("banco.db");

//comando para criar uma tabela no banco.db através de comandos SQL
$db->exec('CREATE TABLE usuarios (email STRING, senha STRING)');

$db->exec("INSERT INTO usuarios(email, senha) VALUES ('$email','$senha')");

//função para redirecionar a página de cadastro direto pro login depois do script salvar.php executar
header("location: login.php");
exit;
/*$lista = $db->query("SELECT * FROM usuarios");

while($ref = $lista->fetchArray()){
    echo $ref["email"], "<br>";
} */