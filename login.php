<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

            width: 100vw;
            height: 100vh;
        }
        .tela_login{
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 500px;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid black;
        }
        h1{
            margin-bottom: 1rem;
        }
        p, a{
            width: 100%;
            margin-bottom: 0.7rem;
        }
        .conteudo_campo{
            width: 100%;
        }
        input{
            width: 100%;
            margin-bottom: 0.3rem;
            padding: 10px;
        }
        button{
            width: 100%;
            padding: 10px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <form action="login.php" method="POST">
        <div class="tela_login">
            <h1>Login</h1>
            <p>Faça seu <a href="cadastro.html">cadastro</a> aqui!</p>
            <div class="conteudo_campo">
                <p>Email</p>
                <input type="text" placeholder="Insira seu email" name="email">
            </div>
            <div class="conteudo_campo">
                <p>Senha</p>
                <input type="text" placeholder="Insira sua senha" name="senha">
            </div>
            <button>Entrar</button>
        </div>
    </form>
    <div>
        <?php

            $email = $_REQUEST["email"];
            $senha = $_REQUEST["senha"];
            
            $autenticado = 0;
            //criamos uma conexão com o banco de dados
            $db = new SQLite3("banco.db");
            $lista = $db->query("SELECT email, senha FROM usuarios");

            while($ref = $lista->fetchArray()){
                if($email == $ref["email"] && $senha == $ref["senha"]){
                    echo "sucesso";
                    $autenticado = 1;
                    break;
                }
            }
            if(!$autenticado) echo "erro";
        ?>
    </div>
</body>
</html>