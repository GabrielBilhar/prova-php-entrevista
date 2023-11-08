<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

$connection = mysqli_connect($servername, $username, $password, $database);


$name = "";
$email = "";
$color = "";

$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $color = $_POST["color"];

    do {
        if ( empty($name) || empty($email) || empty($color) ) {
            $errormessage = "Todos campos devem ser preenchidos";
            break;
        } 

        $sql = "INSERT INTO users (name, email) " .
               "VALUES ('$name', '$email')" .
               "WHERE ";
        $result = $connection->query($sql);

        if($result){
            $errormessage = "Invalid query: " . $connection->error;
            break;
        }

        $sql = "INSERT INTO colors (color) " .
               "VALUES ('$color', '$email')" .
               "WHERE ";
        $result = $connection->query($sql);
        
        if($result){
            $errormessage = "Invalid query: " . $connection->error;
            break;
        }


        $name = "";
        $email = "";
        $color = "";

        $successmessage = "Cadastro bem sucedido";

        header("location: /prova-php-entrevista/index.php");
        exit;

    }while (false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prova php</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Criar Usuário</h2>

        <?php
        if (!empty($errormessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errormessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Cor</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="color" value="<?php echo $color; ?>">
                </div>
            </div>

            <?php
            if (!empty($sucessmessage)){
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$successmessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
                        </div>
                    </div>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a type="btn btn-outline-company" href="/prova-php-entrevista/index.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>