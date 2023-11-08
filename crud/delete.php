<?php
  if (!isset($_GET["id"])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "users";

    $connection = mysqli_connect($servername, $username, $password, $database);
    $sql = "DELETE FROM users WHERE id=$id";
    $connection->query($sql);
}
header("location: /prova-php-entrevista/index.php");
exit;
?>