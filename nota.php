<?php
require_once('BD.php');

session_start();

$consulta=BD::alumnoNotas($_SESSION['cod_alumno'], $_SESSION['cod_prof']);
$notas=$consulta->fetch();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Valoración Exposición de proyectos</title>
        <script src="scripts/jquery-1.11.1.min.js"></script>
        <script src="scripts/jquery.mobile-1.4.2.min.js"></script>
        <link rel="stylesheet" href="styles/jquery.mobile-1.4.2.min.css" />
        <link rel="stylesheet" href="styles/estilos.css" />
    </head>
    <body>
        <div data-role="page" id="datos">
            <div data-role="header">
                <h1>Nota del alumno</h1>
                <a data-role="button" href="logoff.php" class="ui-btn-right">Cerrar Sesión</a>
            </div>
            <div data-role="content">                
                <div data-role="content">
                    <p>Nombre del Profesor: <?php echo $notas['nombre']; ?></p>
                    <p>Nombre del alumno: <?php echo $notas['alumno']; ?></p>
                    <p>Nota final: <?php echo $notas['nota_final']; ?></p>
                </div>              
            </div>
            <div data-role="footer">
                <h5>CPIFP Los enlaces</h5>
            </div>
        </div>
    </body>
</html>
