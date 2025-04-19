<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../admin/login.php");
    exit();
}

include("conexion.php");

$mostrar_form_confirmacion = false;
$id_a_eliminar = null;

// Si se está confirmando la eliminación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirmar_eliminar'])) {
    $id = $_POST['id_producto'];
    $password = $_POST['password'];

    $usuario = $_SESSION['usuario'];
    $verifica = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' AND password = '$password'");

    if (mysqli_num_rows($verifica) > 0) {
        $consulta_img = mysqli_query($conexion, "SELECT imagen FROM productos WHERE id = $id");
        $fila = mysqli_fetch_assoc($consulta_img);

        if ($fila && !empty($fila['imagen']) && file_exists("../" . $fila['imagen'])) {
            unlink("../" . $fila['imagen']);
        }

        $eliminar = mysqli_query($conexion, "DELETE FROM productos WHERE id = $id");

        if ($eliminar) {
            echo "<script>alert('Producto eliminado exitosamente'); window.location='borrar.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error al eliminar'); window.location='borrar.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Contraseña incorrecta'); window.location='borrar.php';</script>";
        exit();
    }
}

// Si solo se quiere mostrar el formulario de confirmación
if (isset($_GET['id'])) {
    $mostrar_form_confirmacion = true;
    $id_a_eliminar = $_GET['id'];
}

// Consulta general para listar productos
$consulta = mysqli_query($conexion, "SELECT * FROM productos");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Productos</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>

<?php if ($mostrar_form_confirmacion): ?>
    <h2>Confirmar Eliminación</h2>
    <form method="POST" action="borrar.php">
        <input type="hidden" name="id_producto" value="<?php echo $id_a_eliminar; ?>">
        <label for="password">Ingresa tu contraseña para confirmar:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" name="confirmar_eliminar" value="Confirmar Eliminación">
    </form>
    <br>
    <a href="borrar.php">Cancelar</a>

<?php else: ?>
    <h2>Eliminar Productos</h2>

    <?php while ($producto = mysqli_fetch_assoc($consulta)) { ?>
        <div class="producto">
            <h3><?php echo $producto['titulo']; ?></h3>
            <p><?php echo $producto['descripcion']; ?></p>
            <p><strong>$<?php echo number_format($producto['precio'], 2); ?></strong></p>
            <?php if (!empty($producto['imagen'])): ?>
                <img src="../<?php echo $producto['imagen']; ?>" alt="Producto">
            <?php endif; ?>
            <br>
            <a class="btn-borrar" href="borrar.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
        </div>
    <?php } ?>

    <br><br>
    <a href="../php/menu.php" class="btn">Volver al Menú</a>
<?php endif; ?>

</body>
</html>

