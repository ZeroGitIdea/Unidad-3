<?php

date_default_timezone_set('Europe/Madrid');
/* Obtener la fecha desde la URL si está definida */
$fecha_param = isset($_GET['fecha']) ? $_GET['fecha'] : date('Y-m-d'); // Valor por defecto

$fecha_actual = new DateTime($fecha_param); // Crea un objeto DateTime con la fecha proporcionada

/* Obtener el mes y el día */
$mes = $fecha_actual->format('m');
$dia = $fecha_actual->format('d');

/* Determinar la estación del año */
$estacion = '';
if (($mes == 12 && $dia >= 21) || ($mes <= 2) || ($mes == 3 && $dia < 21)) {
    $estacion = 'invierno';
} elseif (($mes == 3 && $dia >= 21) || ($mes <= 5) || ($mes == 6 && $dia < 21)) {
    $estacion = 'primavera';
} elseif (($mes == 6 && $dia >= 21) || ($mes <= 8) || ($mes == 9 && $dia < 21)) {
    $estacion = 'verano';
} else {
    $estacion = 'otoño';
}

/* Asignar imagen de cabecera según la estación */
$imagen_estacion = '';
switch ($estacion) {
    case 'invierno':
        $imagen_estacion = 'images/invierno.jpg'; // Cambia el nombre por tu imagen de invierno
        break;
    case 'primavera':
        $imagen_estacion = 'images/primavera.jpg'; // Cambia el nombre por tu imagen de primavera
        break;
    case 'verano':
        $imagen_estacion = 'images/verano.jpg'; // Cambia el nombre por tu imagen de verano
        break;
    case 'otoño':
        $imagen_estacion = 'images/otono.jpg'; // Cambia el nombre por tu imagen de otoño
        break;
}

/* Obtener la hora actual */
$hora = $fecha_actual->format('H');

/* Determinar el color de fondo según la hora del día */
$color_fondo = '';
if ($hora >= 6 && $hora < 12) {
    $color_fondo = '#FFFAE5'; // Mañana - Color claro
} elseif ($hora >= 12 && $hora < 18) {
    $color_fondo = '#FFF8DC'; // Tarde - Color más cálido
} elseif ($hora >= 18 && $hora < 21) {
    $color_fondo = '#FFD700'; // Atardecer - Dorado
} else {
    $color_fondo = '#2F4F4F'; // Noche - Oscuro
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi Portafolio</title>
    <link rel="stylesheet" href="style.css"> <!-- Ruta al archivo CSS -->
    <style>
        html, body {
            background-color: <?php echo $color_fondo; ?>; /* Color de fondo según la hora */
            margin: 0; /* Elimina el margen por defecto */
            display: flex; /* Utiliza Flexbox para el cuerpo */
            flex-direction: column; /* Coloca los elementos en una columna */
        }
        .cabecera {
            width: 100%;
            height: 300px;
            background: url('<?php echo $imagen_estacion; ?>') no-repeat center center;
            background-size: cover;
        }
        /* Asegúrate de que el contenido flexible ocupe el espacio restante */
        .flex {
            flex: 1; /* Hace que el contenido ocupe el espacio restante */
        }
    </style>
</head>
<body>

<header>
    <div class="cabecera"></div> <!-- Aquí se aplicará la imagen de la estación -->
    <h1>Mi Portafolio</h1>
    <nav>
        <ul>
            <li><a href="#about">Sobre Mí</a></li>
            <li><a href="#skills">Habilidades</a></li>
            <li><a href="#projects">Proyectos</a></li>
            <li><a href="#units">Prácticas</a></li>
        </ul>
    </nav>
</header>

<section class="flex" id="about">
    <h2>Sobre Mí</h2>
    <p>Hola, soy Alejandro Carrasco Castellano, curso 2º de DAW en I.E.S. Gran Capitán. Tengo experiencia en varios lenguajes de programación y soy perfeccionista, enfocado en lo que hago.</p>
</section>

<section class="flex" id="skills">
    <h2>Habilidades</h2>
    <div class="skills">
        <p><strong>Lenguajes:</strong> HTML, CSS, JavaScript, Java, PHP</p>
        <p><strong>Frameworks:</strong> React, Django, Bootstrap</p>
        <p><strong>Herramientas:</strong> Git, Figma, VS Code</p>
    </div>
</section>

<section class="flex" id="projects">
    <h2>Proyectos</h2>
    <div class="projects">
        <div class="project">
            <h3>Proyecto 1</h3>
            <img src="images/proyecto1.png" alt="Proyecto 1" class="images">
            <p>Acabo de hacer unos cuantos bucles en DWEC.</p>
            <a class="boton" href="https://github.com/ZeroGitIdea/DWEC/blob/main/UD1_CLIENTE/ACTIVIDADES/UD1/ejercicio1/js/index.js" target="_blank">Ver en GitHub</a>
        </div>
    </div>
</section>

<section class="flex" id="units">
    <h2>Prácticas</h2>
    <div class="unit">
        <a class="boton boton-practicas" href="/DWES/Config/conf.php" target="_blank">Ver Prácticas</a>
    </div>
</section>

<footer>
    <p>© 2024 Alejandro Carrasco Castellano. Todos los derechos reservados.</p>
</footer>

</body>
</html>
