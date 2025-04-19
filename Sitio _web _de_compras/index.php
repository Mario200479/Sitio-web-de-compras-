<?php
include("php/conexion.php");
$resultado = mysqli_query($conexion, "SELECT * FROM productos");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<img class="imglogo" src="img/img1.png" alt="Logo">
<nav>
    <a href="index.php" class="menu">Inicio</a>
    <a href="html/nosotros.html" class="menu">Nosotros</a> 
    <a href="html/contacto.html" class="menu">Contacto</a> 
</nav>

<h2>Productos disponibles</h2>

<div class="productos-grid">
<?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
    <div class="producto">
        <img src="<?php echo $fila['imagen']; ?>" alt="imagen">
        <strong><?php echo $fila['titulo']; ?></strong><br>
        <p><?php echo $fila['descripcion']; ?></p>
        <p><strong>Precio:</strong> $<?php echo $fila['precio']; ?></p>
        <a href="https://wa.me/+524811440849?text=<?php echo urlencode($fila['mensaje_whatsapp'] ?? 'Hola, me interesa este producto'); ?>" class="btn-whatsapp" target="_blank">Consultar por WhatsApp</a>
    </div>
<?php } ?>
</div>

</body>
</html>
