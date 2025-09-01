<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para añadir curso</title>
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
        <h2 id="databaseTitle">Base de datos: añadir nuevo curso</h2>
        <section id="formSection">
            <img src="../../img/enjoyAndLearnLanguageSchoolLogo.png" alt="Cursos">
            <form action="insertar_curso.php" method="post">
                <fieldset>
                    <legend>Nuevo curso</legend>
                    <p>
                        <label for="idioma">Idioma del curso:</label>
                        <input type="text" placeholder="Idioma del curso" id="idioma" name="idioma" required>
                    </p>
                    <p>
                        <label for="nivel">Nivel del curso:</label>
                        <input type="text" id="nivel" name="nivel" placeholder="Nivel del curso" required>
                    </p>
                    <p>
                        <?php
                        $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');
                        $consulta = 'SELECT id_profesor, nombre FROM profesores ORDER BY nombre ASC;';
                        $datos = $conexion->query($consulta);
                        ?>
                        <label for="profesor">Profesor/a:</label>
                        <select name="profesor" id="profesor">
                            <?php
                            while ($fila = mysqli_fetch_array($datos)) {
                                echo '<option value="' . $fila['id_profesor'] . '">' . $fila['nombre'] . '</option>';
                            }
                            ?>
                            <option value="" selected hidden></option>
                        </select>
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