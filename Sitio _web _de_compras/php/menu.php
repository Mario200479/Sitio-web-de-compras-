<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Menú Principal</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<h1>Bienvenido, <?php echo $_SESSION['usuario']; ?> 👋</h1>
<a href="../php/formulario.php" class="btn">Registrar Producto</a>
<a href="../php/borrar.php" class="btn">Eliminar Producto</a>
<a href="../php/logout.php" class="btn btn-danger">Cerrar Sesión</a>
</body>
</html>
