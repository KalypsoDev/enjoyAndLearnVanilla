<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir alumno en la base de datos</title>
</head>

<body>
    <?php
    if (empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['fecha_nacimiento'])) {
        echo '<script>window.alert("Algunos campos del formulario están vacíos. Por favor, comprueba el formulario"); window.location.href="formulario_insertar_alumno.php"</script>';
        exit;
    } else {
        echo '<script>window.alert("Todos los campos se han recibido correctamente");</script>';
    }

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

    $consulta = 'INSERT INTO alumnos (nombre, email, fecha_nacimiento)
    VALUES
    (?, ?, ?);';

    $datos = $conexion->prepare($consulta);

    $datos->bind_param('sss', $nombre, $email, $fecha_nacimiento);

    $datos->execute();

    if ($datos->affected_rows > 0) {
        echo '<script>window.alert("Alumno insertado correctamente en la base de datos"); window.location.href="../../index.html"</script>';
    } else {
        echo '<script>window.alert("Alumno NO insertado correctamente en la base de datos"); window.location.href="formulario_insertar_alumno.php"</script>';
    }

    $conexion->close();
    ?>
</body>

</html>