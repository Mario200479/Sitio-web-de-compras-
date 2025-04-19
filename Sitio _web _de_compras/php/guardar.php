<?php
include("conexion.php");

$titulo            = $_POST['titulo'];
$descripcion       = $_POST['descripcion'];
$precio            = $_POST['precio'];
$mensaje_whatsapp  = $_POST['mensaje_whatsapp'];

$imagen_nombre = $_FILES['imagen']['name'];
$imagen_tmp    = $_FILES['imagen']['tmp_name'];

// Ruta física donde subimos la imagen (desde php/ → img/)
$ruta_imagen = "../img/" . $imagen_nombre;
// Ruta relativa que guardamos en la BD (para usar en la vista pública)
$ruta_imagen_bd = "img/" . $imagen_nombre;

if (move_uploaded_file($imagen_tmp, $ruta_imagen)) {
    $sql = "INSERT INTO productos 
            (titulo, descripcion, precio, imagen, mensaje_whatsapp)
            VALUES 
            ('$titulo', '$descripcion', '$precio', '$ruta_imagen_bd', '$mensaje_whatsapp')";

    if (mysqli_query($conexion, $sql)) {
        // Redirige al menú de administración en /admin/menu.php
        header("Location: ../php/menu.php");
        exit();
    } else {
        echo "Error al guardar en BD: " . mysqli_error($conexion);
    }
} else {
    echo "Error al mover la imagen.";
}
?>


