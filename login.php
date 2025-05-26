<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "data base login";

$conn = mysqli_connect ($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("❌ Error de conexión: " . $conn->connect_error);
}

$nombre_usuario = $_POST['username'];
$contraseña = $_POST['password'];
$email = $_POST['email'];
$query = mysqli_query($conn, "SELECT * FROM usuario WHERE username = '$nombre_usuario' AND pasword = '$contraseña' AND email = '$email'");
$nr = mysqli_num_rows($query);
if ($nr == 1) {
    //header ("Location: index.html");
    echo "✅ Inicio de sesión exitoso.";
} else if ($nr == 0) {
    //header ("Location: login.html");
    echo "❌ Usuario o contraseña incorrectos.";
}