<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      table{
        width: 300px;
      }
      button{
        width: 100%;
      }
    </style>
</head>
<body>
    <h1>Lista de usuarios</h1>
    <form method="REQUEST" action="excluir_usuario.php">
      <table><!--define a tabela -->
          <thead><!--define um cabeçalho-->
            <tr><!--define a linha "table row"-->
              <th>Email</th><!--define a coluna (negrito) "table header"-->
              <th>ação</th>
            </tr>
          </thead>
          <tbody><!--define um corpo-->
            <tr>
              <?php
              $db = new SQLite3("banco.db");
              $lista = $db->query("SELECT email FROM usuarios");

              $i = 1;
                while($usuario = $lista->fetchArray()){
                  echo "<tr>
                          <td>{$usuario["email"]}</td>
                          <td><button name='botao_$i' value='{$usuario["email"]}'>excluir</button></td>
                        </tr>";
                  $i++; 
                }
              ?>
            </tr>
          </tbody>
        </table>
    </form>
</body>
</html>

