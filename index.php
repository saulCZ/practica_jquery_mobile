<?php
require_once('BD.php');

session_start();
$error="";

if (isset($_POST['login'])) {
    $usuario = filter_input(INPUT_POST, 'usuario');
    $pass = filter_input(INPUT_POST, 'password');
    
    if ((empty($usuario)) || (empty($pass)))    {
        $error="Debes introducir un nombre de usuario y una contraseña";
    } else {
        // Comprobamos las credenciales con la base de datos
        $consulta=BD::obtenerUsuarios($usuario, $pass);
        if ($consulta->rowCount()>0) {
            $fila = $consulta->fetch();
            session_start();
            $_SESSION['cod_prof']=$fila['cod_prof'];
            $_SESSION['profesor']=$fila['nombre'];
            header("Location: index.php#seleccion");            
        } else {
            $error="Usuario o contraseña no válidos!";
        }
    }
}

if (isset($_POST['valorar'])) {
    $codAlumno = filter_input(INPUT_POST, 'alumno');
    $codCurso = filter_input(INPUT_POST, 'curso');
    header("Location: valoracion.php?codAlumno=$codAlumno&codCurso=$codCurso");
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
        <!-- Página 1-->
        <div data-role="page" id="main">
            <div data-role="header">
                <h1>Valoraciones de exposiciones de proyectos</h1>
            </div>
            <div data-role="content">                
                <!--FORMULARIO-------------------------------------------------->
                <div data-role="content">
                    <form action="index.php" method="POST" data-ajax="false">
                        <h2>Login</h2>
                        <div data-role="fieldcontain" class="error"><p><?php echo $error; ?></p></div>
                        <div data-role="fieldcontain">
                            <label for="name">Usuario:</label>
                            <input type="text" name="usuario" id="txtuser" value="" />
                        </div>
                        <div data-role="fieldcontain">
                            <label for="contrasena">Password:</label>
                            <input type="password" name="password" id="txtpassword" value="" />
                        </div>
                        <input type="submit" name="login" id="login" value="Login" />
                        <a data-role="button" href="#seleccion">Entrar</a>
                    </form>
                </div>
            <!--FIN DEL FORMULARIO------------------------------------------------->                
            </div>
            <div data-role="footer">
                <h5>CPIFP Los enlaces</h5>
            </div>
        </div>
        <!-- Fin página 1 -->
        
        <!-- Página 2-->      
        <div data-role="page" id="seleccion">
            <div data-role="header">
                <h1>Valoraciones de exposiciones de proyectos</h1>
                <a data-role="button" href="logoff.php" class="ui-btn-right">Cerrar Sesión</a>
            </div>
            <div data-role="content">
                <div data-role="content" class="ui-content">
                    <h2>Alumno y Curso</h2>
                    <form action="index.php" method="post" data-ajax="false">
                        <fieldset class="ui-field-contain">
                            <label for="alumno">Alumno</label>
                            <select name="alumno" id="alumno">
                            <?php
                            $alumnos=  BD::obtenerAlumnos();
                            while ($fila = $alumnos->fetch()) {
                                echo "<option value=\"".$fila['cod_alumno']."\">".$fila['nombre']."</option>
                                ";}
                            ?>
                            </select>
                            <label for="curso">Curso</label>
                            <select name="curso" id="durso">
                            <?php
                            $cursos=  BD::obtenerCursos();
                            while ($fila = $cursos->fetch()) {
                                echo "<option value=\"".$fila['cod_curso']."\">".$fila['curso']."</option>
                                ";}
                            ?>
                            </select>
                        </fieldset>
                        <input type="submit" name="valorar" id="valorar" value="Valorar" />
                    </form>
                </div>
            </div>
            <div data-role="footer">
                <h5>CPIFP Los enlaces</h5>
            </div>
        </div>
        <!-- Fin página 2 -->
    </body>
</html>
