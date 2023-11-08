<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Lista Usuários</h2>
        <a class="btn btn-primary" href="/prova-php-entrevista/crud/create.php" role="button">Novo usuário</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Cor Favorita</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "users";

                $connection = mysqli_connect($servername, $username, $password, $database);

                if(!$connection){
                    die("Falha na conexão: " . mysqli_connect_error());
                }
                
                $sql = "SELECT * FROM users";
                $result = $connection->query($sql);

                if(!$result){
                    die("Falha na conexão: " . mysqli_connect_error());
                }

                while($row = $result->fetch_assoc()){
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[color]</td>
                        <td>
                            <a class='btn btn-primaty btn-sm' href='/prova-php-entrevista/crud/edit.php?id=$row[id]'>Editar</a>
                            <a class='btn btn-primaty btn-sm' href='/prova-php-entrevista/crud/delete.php?id=$row[id]'>Excluir</a>
                        </td>
                    </tr>
                    ";
                }
                ?>
            </tbody> 
        </table>
    </div>
</body>
</html>