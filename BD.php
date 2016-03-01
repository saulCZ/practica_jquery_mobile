<?php

/**
 * Description of DB
 *
 * @author Alumno
 */

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
        $valores = array('usuario'=>$usuario, 'password'=>$password);
        $sql = "SELECT * FROM profesores WHERE nombre=:usuario AND password=MD5(:password)";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute($valores);
            
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
    
    /**
     * 
     * @param type $valores
     * @return type
     */
    static function insertarValoracion($valores)    {
        $insercion=false;
        
        $sql = "INSERT INTO valoraciones VALUES (:cod_alumno, :cod_curso, :cod_prof, :planteamiento, :contenido, :resultados, :escrita, "
                . ":redaccion, :organizacion, :introduccion, :desarrollo, :conclusion, :seguridad, :entonacion, :volumen, :velocidad, :vacilacion, "
                . ":pausas, :muletillas, :duracion, :indumentaria, :mirada, :facial, :posicion, :tics, :publico, :responder, :nota_final)";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute($valores);
            
            if ($consulta->rowCount()>0)    {
                $insercion=true;
            }
            
            self::$conexion=NULL;
            
            return $insercion;          
        } catch (PDOException $err) {
            $error="Error: ".$err->getMessage();
        }
    }
    
    /**
     * 
     * @param type $cod_alumno
     * @param type $cod_prof
     * @return type
     */
    static function alumnoNotas($cod_alumno, $cod_prof)    {
        $valores = array('cod_alumno'=>$cod_alumno, 'cod_prof'=>$cod_prof);
        $sql = "SELECT alumno, nota_final, nombre FROM alumnos, valoraciones, profesores "
                . "WHERE alumnos.cod_alumno=:cod_alumno AND valoraciones.cod_alumno=:cod_alumno AND profesores.cod_prof=:cod_prof";
        
        if (self::$conexion==NULL)  {
            self::conectar();
        }
        $conex=  self::$conexion;
        try {
            $consulta=$conex->prepare($sql);
            $consulta->execute($valores);
             
            self::$conexion=NULL;
            
            return $consulta;          
        } catch (PDOException $err) {
            $error="Error: ".$err->getMessage();
        }
    }
    
}
