<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de cursos</title>
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
        <h2 id="databaseTitle">Base de datos: lista de cursos</h2>
        <section id="resultSection">
            <img src="../../img/enjoyAndLearnLanguageSchoolLogo.png" alt="Cursos">
            <?php
            $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

            $resultado = $conexion->query("SELECT 
    c.idioma AS idioma,
    c.nivel AS nivel,
    p.nombre AS nombre_profesor
FROM cursos c
JOIN profesores p ON c.id_profesor = p.id_profesor ORDER BY idioma, nivel ASC;
");

            $cursos = $resultado->fetch_all(MYSQLI_ASSOC);

            echo '<table>';

            echo '<tr><th>Idioma</th><th>Nivel</th><th>Profesor/a</th></tr>';

            foreach ($cursos as $curso) {
                echo '<tr>
        <td>' . htmlspecialchars($curso['idioma']) . '</td>
        <td>' . htmlspecialchars($curso['nivel']) . '</td>
        <td>' . htmlspecialchars($curso['nombre_profesor']) . '</td>
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