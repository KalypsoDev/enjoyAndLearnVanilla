<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para añadir matrícula</title>
    <link rel="stylesheet" href="../../css/enjoyLearnSchool.css">
</head>

<body>
    <header>
        <section id="logoSection">
            <a href="../../index.html"><img src="../../img/enjoyAndLearnLanguageSchoolLogo.png"
                    alt="Logo de Enjoy and Learn" id="logo"></a>
            <h1>Enjoy And Learn Language School</h1>
        </section>
        <nav>
            <a href="../../pages/nuestra-historia.html">Nuestra historia</a>
            <a href="../../pages/nuestro-equipo.html">Nuestro equipo</a>
            <a href="../../pages/valoraciones.html">Valoraciones</a>
            <a href="../../pages/contacto.html">Contacto</a>
        </nav>
    </header>
    <main>
        <h2 id="databaseTitle">Base de datos: añadir nueva matrícula</h2>
        <section id="formSection">
            <img src=" ../../img/enrollments.png" alt="Matrículas">
            <form action="insertar_matricula.php" method="post">
                <fieldset>
                    <legend>Nueva matrícula</legend>
                    <p>
                        <?php
                        $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');
                        $consulta = 'SELECT id_alumno, nombre FROM alumnos ORDER BY nombre ASC;';
                        $datos = $conexion->query($consulta);
                        ?>
                        <label for="alumno">Alumno/a:</label>
                        <select name="alumno" id="alumno">
                            <?php
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo '<option value="' . $fila['id_alumno'] . '">' . $fila['nombre'] . '</option>';
                            }
                            ?>
                            <option value="" selected hidden></option>
                        </select>
                    </p>
                    <p>
                        <?php
                        $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');
                        $consulta = "SELECT id_curso, CONCAT(idioma, ' ', nivel) AS curso FROM cursos ORDER BY idioma, nivel ASC;";
                        $datos = $conexion->query($consulta);
                        ?>
                        <label for="curso">Curso:</label>
                        <select name="curso" id="curso">
                            <?php
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo '<option value="' . $fila['id_curso'] . '">' . $fila['curso'] . '</option>';
                            }
                            ?>
                            <option value="" selected hidden></option>
                        </select>
                    </p>
                    <p>
                        <label for="fecha">Fecha de matrícula:</label>
                        <input type="date" id="fecha_matricula" name="fecha_matricula" required>
                    </p>
                </fieldset>
                <section id="buttonsSection">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Limpiar">
                </section>
            </form>
        </section>
    </main>
    <footer>
        <p>Copyright © 2025 KalypsoDev - All rights reserved</p>
    </footer>
</body>

</html>