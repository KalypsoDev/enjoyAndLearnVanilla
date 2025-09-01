<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario para añadir profesor</title>
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
        <h2 id="databaseTitle">Base de datos: añadir nuevo profesor</h2>
        <section id="formSection">
            <img src="../../img/teachers.png" alt="Profesores">
            <form action="insertar_profesor.php" method="post">
                <fieldset>
                    <legend>Nuevo profesor</legend>
                    <p>
                        <label for="nombre">Nombre del profesor:</label>
                        <input type="text" placeholder="Nombre del profesor" id="nombre" name="nombre" required>
                    </p>
                    <p>
                        <label for="especialidad">Especialidad del profesor:</label>
                        <input type="text" placeholder="Especialidad del profesor" id="especialidad" name="especialidad"
                            required>
                    </p>
                    <p>
                        <label for="email">Email del profesor:</label>
                        <input type="email" id="email" name="email" placeholder="Email del profesor" required>
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