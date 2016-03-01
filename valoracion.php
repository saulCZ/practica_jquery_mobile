<?php
require_once('BD.php');

session_start();

$error="";

if (isset($_POST['enviar'])) {
    session_start();
    $valoracion = array('cod_alumno'=> intval($_SESSION['cod_alumno']),
        'cod_curso'=> intval($_SESSION['cod_curso']),
        //Contenido
        'planteamiento'=> intval(filter_input(INPUT_POST, 'planteamiento')),
        'contenido'=> intval(filter_input(INPUT_POST, 'contenido')),
        'resultados'=> intval(filter_input(INPUT_POST, 'resultados')),
        //Presentacion escrita
        'escrita'=> intval(filter_input(INPUT_POST, 'escrita')),
        'redaccion'=> intval(filter_input(INPUT_POST, 'redaccion')),
        'organizacion'=> intval(filter_input(INPUT_POST, 'organizcion')),
        //Oral
        'introduccion'=> intval(filter_input(INPUT_POST, 'introduccion')),
        'desarrollo'=> intval(filter_input(INPUT_POST, 'desarrollo')),
        'conclusion'=> intval(filter_input(INPUT_POST, 'conclusion')),
        //Exposicion
        'seguridad'=> intval(filter_input(INPUT_POST, 'seguridad')),
        'entonacion'=> intval(filter_input(INPUT_POST, 'entonacion')),
        'volumen'=> intval(filter_input(INPUT_POST, 'volumen')),
        'velocidad'=> intval(filter_input(INPUT_POST, 'velocidad')),
        'vacilacion'=> intval(filter_input(INPUT_POST, 'vacilacion')),
        'pausas'=> intval(filter_input(INPUT_POST, 'pausas')),
        'muletillas'=> intval(filter_input(INPUT_POST, 'muletillas')),
        'duracion'=> intval(filter_input(INPUT_POST, 'duracion')),
        //No verbal
        'indumentaria'=> intval(filter_input(INPUT_POST, 'indumentaria')),
        'mirada'=> intval(filter_input(INPUT_POST, 'mirada')),
        'facial'=> intval(filter_input(INPUT_POST, 'facial')),
        'posicion'=> intval(filter_input(INPUT_POST, 'posicion')),
        'tics'=> intval(filter_input(INPUT_POST, 'tics')),
        //Retroalimentacion
        'publico'=> intval(filter_input(INPUT_POST, 'publico')),
        'responder'=> intval(filter_input(INPUT_POST, 'responder')));
        
    $notaFinal= (($valoracion['planteamiento']+$valoracion['contenido']+$valoracion['resultados'])/3*0.65)+
        (($valoracion['escrita']+$valoracion['redaccion']+$valoracion['organizacion'])/3*0.1)+
        (($valoracion['introduccion']+$valoracion['desarrollo']+$valoracion['conclusion']+$valoracion['seguridad']+
        $valoracion['entonacion']+$valoracion['volumen']+$valoracion['velocidad']+$valoracion['vacilacion']+$valoracion['pausas']+
        $valoracion['muletillas']+$valoracion['duracion']+$valoracion['indumentaria']+$valoracion['mirada']+$valoracion['facial']+
        $valoracion['poscion']+$valoracion['tics']+$valoracion['publico']+$valoracion['responder'])/18*0.25);
    
    $valoracion['nota_final']=$notaFinal;
    $valoracion['cod_prof']=intval($_SESSION['cod_prof']);
    
    if (BD::insertarValoracion($valoracion))   {
        header("Location: nota.php");
    } else {
        $error="Error al insertar los datos. Revise que todos los datos son correctos";
    }    
}
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
        <div data-role="page" id="valoracion">
            <div data-role="header">
                <h1>Valoraciones del proyecto del alumno </h1>
                <a data-role="button" href="logoff.php" class="ui-btn-right">Cerrar Sesión</a>
            </div>
            <div data-role="content">
                <div data-role="content" class="ui-content">
                    <h2>Valoracion del alumno</h2>
                    <div data-role="fieldcontain" class="error"><p><?php echo $error; ?></p></div>
                    <form action="valoracion.php" method="post" data-ajax="false">
                        <fieldset class="ui-field-contain">
                            <h3>Contenido del proyecto</h3>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Planteamiento:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="planteamiento" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="planteamiento" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="planteamiento" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="planteamiento" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="planteamiento" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="planteamiento" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="planteamiento" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="planteamiento" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="planteamiento" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="planteamiento" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Contenido:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="contenido" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="contenido" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="contenido" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="contenido" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="contenido" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="contenido" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="contenido" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="contenido" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="contenido" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="contenido" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Resultados obtenidos:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="resultados" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="resultados" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="resultados" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="resultados" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="resultados" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="resultados" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="resultados" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="resultados" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="resultados" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="resultados" id="10" value="10" />
                            </fieldset>
                        </fieldset>
                        <hr />
                        <fieldset class="ui-field-contain">
                            <h3>Calidad de presentación</h3>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Presentación escrita:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="escrita" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="escrita" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="escrita" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="escrita" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="escrita" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="escrita" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="escrita" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="escrita" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="escrita" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="escrita" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Redacción y claridad del texto:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="redaccion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="redaccion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="redaccion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="redaccion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="redaccion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="redaccion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="redaccion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="redaccion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="redaccion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="redaccion" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Organización del contenido:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="organizacion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="organizacion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="organizacion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="organizacion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="organizacion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="organizacion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="organizacion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="organizacion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="organizacion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="organizacion" id="10" value="10" />
                            </fieldset>
                        </fieldset>
                        <hr />
                        <fieldset class="ui-field-contain">
                            <h3>Expresión oral</h3>
                            <h4>Contenido:</h4>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Introducción:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="introduccion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="introduccion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="introduccion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="introduccion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="introduccion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="introduccion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="introduccion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="introduccion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="introduccion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="introduccion" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Desarrollo:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="desarrollo" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="desarrollo" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="desarrollo" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="desarrollo" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="desarrollo" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="desarrollo" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="desarrollo" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="desarrollo" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="desarrollo" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="desarrollo" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Conclusión:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="conclusion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="conclusion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="conclusion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="conclusion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="conclusion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="conclusion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="conclusion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="conclusion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="conclusion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="conclusion" id="10" value="10" />
                            </fieldset>
                            <hr />
                            <h4>Exposición:</h4>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Seguridad y entusiasmo en lo que expone:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="seguridad" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="seguridad" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="seguridad" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="seguridad" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="seguridad" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="seguridad" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="seguridad" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="seguridad" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="seguridad" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="seguridad" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Entonación:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="entonacion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="entonacion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="entonacion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="entonacion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="entonacion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="entonacion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="entonacion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="entonacion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="entonacion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="entonacion" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Volumen:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="volumen" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="volumen" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="volumen" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="volumen" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="volumen" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="volumen" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="volumen" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="volumen" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="volumen" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="volumen" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Velocidad:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="velocidad" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="velocidad" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="velocidad" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="velocidad" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="velocidad" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="velocidad" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="velocidad" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="velocidad" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="velocidad" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="velocidad" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Vacilación en la voz:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="vacilacion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="vacilacion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="vacilacion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="vacilacion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="vacilacion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="vacilacion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="vacilacion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="vacilacion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="vacilacion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="vacilacion" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Pausas:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="pausas" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="pausas" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="pausas" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="pausas" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="pausas" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="pausas" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="pausas" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="pausas" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="pausas" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="pausas" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Uso de muletillas:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="muletillas" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="muletillas" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="muletillas" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="muletillas" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="muletillas" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="muletillas" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="muletillas" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="muletillas" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="muletillas" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="muletillas" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Duración adecuada:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="duracion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="duracion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="duracion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="duracion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="duracion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="duracion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="duracion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="duracion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="duracion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="duracion" id="10" value="10" />
                            </fieldset>
                            <hr />
                            <h4>Lenguaje no verbal</h4>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Indumentaria:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="indumentaria" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="indumentaria" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="indumentaria" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="indumentaria" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="indumentaria" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="indumentaria" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="indumentaria" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="indumentaria" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="indumentaria" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="indumentaria" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Mirada:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="mirada" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="mirada" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="mirada" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="mirada" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="mirada" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="mirada" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="mirada" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="mirada" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="mirada" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="mirada" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Expresión facial:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="facial" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="facial" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="facial" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="facial" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="facial" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="facial" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="facial" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="facial" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="facial" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="facial" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Posición del cuerpo:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="posicion" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="posicion" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="posicion" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="posicion" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="posicion" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="posicion" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="posicion" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="posicion" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="posicion" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="posicion" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Tics y gestos nerviosos:</legend>
                                <label for="1">1</label>
                                <input type="radio" name="tics" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="tics" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="tics" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="tics" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="tics" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="tics" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="tics" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="tics" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="tics" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="tics" id="10" value="10" />
                            </fieldset>
                            <hr />
                            <h4>Retroalimentación:</h4>
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>¿Logra atraer la atención del público?</legend>
                                <label for="1">1</label>
                                <input type="radio" name="publico" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="publico" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="publico" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="publico" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="publico" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="publico" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="publico" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="publico" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="publico" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="publico" id="10" value="10" />
                            </fieldset> <br /><br />
                            <fieldset data-role="controlgroup" data-type="horizontal">
                                <legend>Preguntas realizadas: ¿Responde de forma coherente?</legend>
                                <label for="1">1</label>
                                <input type="radio" name="responder" id="1" value="1" />
                                <label for="2">2</label>
                                <input type="radio" name="responder" id="2" value="2" />
                                <label for="3">3</label>
                                <input type="radio" name="responder" id="3" value="3" />
                                <label for="4">4</label>
                                <input type="radio" name="responder" id="4" value="4" />
                                <label for="5">5</label>
                                <input type="radio" name="responder" id="5" value="5" />
                                <label for="6">6</label>
                                <input type="radio" name="responder" id="6" value="6" />
                                <label for="7">7</label>
                                <input type="radio" name="responder" id="7" value="7" />
                                <label for="8">8</label>
                                <input type="radio" name="responder" id="8" value="8" />
                                <label for="9">9</label>
                                <input type="radio" name="responder" id="9" value="9" />
                                <label for="10">10</label>
                                <input type="radio" name="responder" id="10" value="10" />
                            </fieldset> <br /><br />
                        </fieldset>
                        <input type="submit" name="enviar" id="enviar" value="Mandar Valoracón" />
                    </form>
                </div>
            </div>
            <div data-role="footer">
                <h5>CPIFP Los enlaces</h5>
            </div>
        </div>
    </body>
</html>
