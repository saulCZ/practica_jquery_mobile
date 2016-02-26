<?php
require_once('BD.php');

$error="";

if (isset($_POST['login'])) {
    $usuario = filter_input(INPUT_POST, 'usuario');
    $pass = filter_input(INPUT_POST, 'password');
    
    if ((empty($usuario)) || (empty($pass)))    {
        $error="Debes introducir un nombre de usuario y una contraseña";
    } else {
        // Comprobamos las credenciales con la base de datos
        if (BD::obtenerUsuarios($usuario, $pass)) {
            session_start();
            $_SESSION['usuario']=$usuario;
            header("Location: index.php#page2");            
        } else {
            $error="Usuario o contraseña no válidos!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Valoración Exposición de proyectos</title>
        <script src="scripts/jquery-1.11.1.min.js"></script>
        <script src="scripts/jquery.mobile-1.4.5.min.js"></script>
        <link rel="stylesheet" href="styles/jquery.mobile-1.4.5.min.css" />
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
                        <a data-role="button" href="#page2">Entrar</a>
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
        <div data-role="page" id="page2">
            <div data-role="header">
                <h1>Valoraciones de exposiciones de proyectos</h1>
                <a data-role="button" href="logoff.php" class="ui-btn-right">Cerrar Sesión</a>
            </div>
            <div data-role="content">
                <div data-role="main" class="ui-content">
                    <h2>Alumno y Curso</h2>
                    <form action="#" method="post">
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
                        <input type="submit" name="valorar" id="login" value="Valorar" />
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
