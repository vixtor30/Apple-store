<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "data base login";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}

$nombre_usuario = $_POST['username'];
$contraseña = $_POST['pasword'];
$email = $_POST['email'];

// Verificar si el usuario o email ya existen
$query = mysqli_query($conn, "SELECT * FROM usuario WHERE username = '$nombre_usuario' OR email = '$email'");
$nr = mysqli_num_rows($query);

if ($nr > 0) {
    echo "❌ El usuario o email ya están registrados.";
} else {
    // Insertar nuevo usuario
    $insert = mysqli_query($conn, "INSERT INTO usuario (username, pasword, email) VALUES ('$nombre_usuario', '$contraseña', '$email')");
    if ($insert) {
        echo "✅ Registro exitoso.";
    } else {
        echo "❌ Error al registrar usuario.";
    }
}
?>