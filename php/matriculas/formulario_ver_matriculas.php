<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de matrículas</title>
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
        <h2 id="databaseTitle">Base de datos: lista de matrículas</h2>
        <section id="resultSection">
            <img src="../../img/enrollments.png" alt="Matrículas">
            <?php
            $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

            $resultado = $conexion->query("SELECT 
    a.nombre AS nombre_alumno,
    CONCAT(c.idioma, ' ', c.nivel) AS curso,
    DATE_FORMAT(m.fecha_matricula, '%d/%m/%Y') AS fecha_matricula
FROM matriculas m
JOIN alumnos a ON m.id_alumno = a.id_alumno
JOIN cursos c ON m.id_curso = c.id_curso
ORDER BY m.fecha_matricula ASC;

");

            $matriculas = $resultado->fetch_all(MYSQLI_ASSOC);

            echo '<table>';

            echo '<tr><th>Alumno/a</th><th>Curso</th><th>Fecha de matrícula</th></tr>';

            foreach ($matriculas as $matricula) {
                echo '<tr>
        <td>' . htmlspecialchars($matricula['nombre_alumno']) . '</td>
        <td>' . htmlspecialchars($matricula['curso']) . '</td>
        <td>' . htmlspecialchars($matricula['fecha_matricula']) . '</td>
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