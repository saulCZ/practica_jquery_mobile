<?php

/**
 * Description of DB
 *
 * @author Alumno
 */

//require_once('Producto.php');

class BD {
    private static $conexion;
    
    /**
     * 
     */
    private static function conectar()  {   
        try { 
            $conex = new PDO('mysql:host=localhost;dbname=jquerymobile','root','root');
            $conex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $err)    {
            die ('Abortamos la aplicaci�n por fallo conectando con la BD' . $err->getMessage());
        }
        self::$conexion=$conex;
    }
    
    /**
     * 
     * @param type $usuario
     * @param type $password
     * @return boolean
     */
    static function obtenerUsuarios($usuario, $password)    {
        $login=false;
        $valores = array('usuario'=>$usuario, 'password'=>$password);
        $sql = "SELECT * FROM profesores WHERE nombre=:usuario AND password=MD5(:password)";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute($valores);
            
            if ($consulta->rowCount()>0)    {
                $login=true;
            }          
            self::$conexion=NULL;
            
            return $login;          
        } catch (PDOException $err) {
            $error="Error: ".$err->getMessage();
        }
    }
    
    /**
     * 
     * @return type
     */
    static function obtenerCursos()    {
        $sql = "SELECT * FROM cursos";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute();
            
            self::$conexion=NULL;
            
            return $consulta;          
        } catch (PDOException $err) {
            $error="Error: ".$err->getMessage();
        }
    }
    
    /**
     * 
     * @return type
     */
    static function obtenerAlumnos()    {
        $sql = "SELECT * FROM alumnos";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute();
            
            self::$conexion=NULL;
            
            return $consulta;          
        } catch (PDOException $err) {
            $error="Error: ".$err->getMessage();
        }
    }
}
