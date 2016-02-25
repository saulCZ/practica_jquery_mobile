<?php
require_once('BD.php');

$error="";

if (isset($_POST['login'])) {
    var_dump($_POST);
    $usuario = filter_input(INPUT_POST, 'usuario');
    $pass = filter_input(INPUT_POST, 'password');
    
    if ((empty($usuario)) || (empty($pass)))    {
        $error="Debes introducir un nombre de usuario y una contraseña";
    } else {
        // Comprobamos las credenciales con la base de datos
        if (BD::obtenerUsuarios($usuario, $pass)) {
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
        <title>Exposición de proyectos - Login</title>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
        <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <style type="text/css">
            .error p {
                color: crimson;
            }
        </style>
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
                <h4>Pagina realizada por</h4>
            </div>
        </div>
        <!-- Fin página 1 -->
        
        <!-- Página 2-->      
        <div data-role="page" id="page2">
            <div data-role="header" data-add-back-btn="true" data-back-btn-text="Atrás">
                <h1>Valoraciones de exposiciones de proyectos</h1>
            </div>
            <div data-role="content">
                <div data-role="main" class="ui-content">
                    <h2>Login</h2>
                    <form action="#" method="post">
                        <fieldset class="ui-field-contain">
                            <label for="curso">Curso</label>
                            <select name="curso" id="durso">
                                <option value="daw">Desarrollo de Aplicaciones WEB</option>
                                <option value="dam">Desarrollo de Aplicaciones Multiplataforma</option>
                                <option value="asir">Adimistración de Sistemas Informáticos y Redes</option>
                                <option value="smr">Sistemas Microinformáticos y Redes</option>
                            </select>
                            <label for="alumno">Alumno</label>
                            <select name="alumno" id="alumno">
                                <option value="">Alumno 1</option>
                                <option value="">Alumno 2</option>
                                <option value="">Alumno 3</option>
                            </select>
                        </fieldset>
                        <a data-role="button" href="#dialog1">Entrar</a>
                    </form>
                </div>
            </div>
            <div data-role="footer">
                <h4>Pagina realizada por</h4>
            </div>
        </div>
        <!-- Fin página 2 -->
    </body>
</html>
