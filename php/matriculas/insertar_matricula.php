<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir matrícula en la base de datos</title>
</head>

<body>
    <?php
    if (empty($_POST['alumno']) || empty($_POST['curso']) || empty($_POST['fecha_matricula'])) {
        echo '<script>window.alert("Algunos campos del formulario están vacíos. Por favor, comprueba el formulario"); window.location.href="formulario_insertar_matricula.php"</script>';
        exit;
    } else {
        echo '<script>window.alert("Todos los campos se han recibido correctamente");</script>';
    }

    $alumno = $_POST['alumno'];
    $curso = $_POST['curso'];
    $fecha_matricula = $_POST['fecha_matricula'];

    $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

    $consulta = 'INSERT INTO matriculas (id_alumno, id_curso, fecha_matricula)
    VALUES
    (?, ?, ?);';

    $datos = $conexion->prepare($consulta);

    $datos->bind_param('sss', $alumno, $curso, $fecha_matricula);

    $datos->execute();

    if ($datos->affected_rows > 0) {
        echo '<script>window.alert("Matrícula insertada correctamente en la base de datos"); window.location.href="../../index.html"</script>';
    } else {
        echo '<script>window.alert("Matrícula NO insertada correctamente en la base de datos"); window.location.href="formulario_insertar_matricula.php"</script>';
    }

    $conexion->close();
    ?>
</body>

</html>