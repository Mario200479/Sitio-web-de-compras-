<?php
session_start();

// Bloquea acceso directo sin login
if (!isset($_SESSION['usuario']) || !isset($_SESSION['acceso_formulario']) || $_SESSION['acceso_formulario'] !== true) {
    header("Location: login.php");
    exit();
}

// Borra el permiso después de entrar

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<h2>Agregar nuevo producto</h2>
<p>Usuario: <?php echo $_SESSION['usuario']; ?> | <a href="../php/logout.php">Cerrar sesión</a></p>

<form action="../php/guardar.php" method="POST" enctype="multipart/form-data">
    <label for="imagen">Imagen:</label>
    <input type="file" name="imagen" required><br>

    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required><br>

    <label for="descripcion">Descripción:</label>
    <textarea name="descripcion" required></textarea><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" step="0.01" required><br>

    <label for="mensaje_whatsapp">Mensaje de WhatsApp:</label>
    <textarea name="mensaje_whatsapp" placeholder="Ej: Hola, estoy interesado en este producto..." required></textarea><br>

    <input type="submit" value="Guardar Producto">
    <a href="../php/menu.php" class="btn">Volver al Menú</a>
</form>

</body>
</html>
