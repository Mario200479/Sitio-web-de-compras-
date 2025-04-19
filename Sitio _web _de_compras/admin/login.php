<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="../css/estilos.css"> 
</head>
<body>

<h2>Login</h2>

<form action="../php/registrarp.php" method="POST"> 
    <label for="usuario">Usuario:</label>
    <input type="text" name="usuario" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" name="password" required><br>

    <input type="submit" value="Ingresar">
</form>

</body>
</html>

