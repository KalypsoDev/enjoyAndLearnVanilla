<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir curso en la base de datos</title>
</head>

<body>
    <?php
    if (empty($_POST['idioma']) || empty($_POST['nivel']) || empty($_POST['profesor'])) {
        echo '<script>window.alert("Algunos campos del formulario están vacíos. Por favor, comprueba el formulario"); window.location.href="formulario_insertar_curso.php"</script>';
        exit;
    } else {
        echo '<script>window.alert("Todos los campos se han recibido correctamente");</script>';
    }

    $idioma = $_POST['idioma'];
    $nivel = $_POST['nivel'];
    $profesor = $_POST['profesor'];

    $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

    $consulta = 'INSERT INTO cursos (idioma, nivel, id_profesor)
    VALUES
    (?, ?, ?);';

    $datos = $conexion->prepare($consulta);

    $datos->bind_param('sss', $idioma, $nivel, $profesor);

    $datos->execute();

    if ($datos->affected_rows > 0) {
        echo '<script>window.alert("Curso insertado correctamente en la base de datos"); window.location.href="../../index.html"</script>';
    } else {
        echo '<script>window.alert("curso NO insertada correctamente en la base de datos"); window.location.href="formulario_insertar_curso.php"</script>';
    }

    $conexion->close();
    ?>
</body>

</html>