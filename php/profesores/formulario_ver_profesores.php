<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de profesores</title>
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
        <h2 id="databaseTitle">Base de datos: lista de profesores</h2>
        <section id="resultSection">
            <img src="../../img/teachers.png" alt="Profesores">
            <?php
            $conexion = new mysqli('localhost', 'root', '', 'escuela_idiomas');

            $resultado = $conexion->query("SELECT nombre, especialidad, email FROM profesores ORDER BY nombre ASC");

            $profesores = $resultado->fetch_all(MYSQLI_ASSOC);

            echo '<table>';

            echo '<tr><th>Nombre</th><th>Especialidad</th><th>Email</th></tr>';

            foreach ($profesores as $profesor) {
                echo '<tr>
        <td>' . htmlspecialchars($profesor['nombre']) . '</td>
        <td>' . htmlspecialchars($profesor['especialidad']) . '</td>
        <td>' . htmlspecialchars($profesor['email']) . '</td>
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