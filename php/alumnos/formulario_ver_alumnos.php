<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de alumnos</title>
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
        <h2 id="databaseTitle">Base de datos: lista de alumnos</h2>
        <section id="resultSection">
            <img src="../../img/students.png" alt="Alumnos">
            <?php
            $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

            $resultado = $conexion->query("SELECT 
    nombre, 
    email, 
    DATE_FORMAT(fecha_nacimiento, '%d/%m/%Y') AS `fecha_nacimiento`
FROM alumnos 
ORDER BY nombre ASC");

            $alumnos = $resultado->fetch_all(MYSQLI_ASSOC);

            echo '<table>';

            echo '<tr><th>Nombre</th><th>Email</th><th>Fecha de nacimiento</th></tr>';

            foreach ($alumnos as $alumno) {
                echo '<tr>
        <td>' . htmlspecialchars($alumno['nombre']) . '</td>
        <td>' . htmlspecialchars($alumno['email']) . '</td>
        <td>' . htmlspecialchars($alumno['fecha_nacimiento']) . '</td>
    </tr>';
            };

            echo '</table>';

            $conexion->close();
            ?>
        </section>
    </main>
    <footer>
        <p>Copyright © 2025 KalypsoDev - All rights reserved</p>
    </footer>
</body>

</html>