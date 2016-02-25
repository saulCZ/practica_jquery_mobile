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
    
    protected static function ejecutaConsulta($sql, $valores) {
       if (self::$conexion == null) {
           self::conectar();
       }
       $conex = self::$conexion;
       try{
           $consulta = $conex->prepare($sql);
           $consulta->execute($valores);
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
        self::$conexion=NULL;
       return $consulta;
    }
    
    protected static function ejecutaConsulta2($sql) {
       if (self::$conexion == null) {
           self::conectar();
       }
       $conex = self::$conexion;
       try{
           $consulta = $conex->prepare($sql);
           $consulta->execute();
       }catch (PDOException $e) {
           echo 'No se ha podido ejecutar la consulta' . $e->getMessage();
           return null;
        }
        self::$conexion=NULL;
       return $consulta;
 
    }
    
    public static function obtenerProductos() {
 
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto;";
        $resultado = self::ejecutaConsulta2 ($sql);
        $productos = array();
 
	if($resultado) {
            // A�adimos un elemento por cada producto obtenido
            while ($row=$resultado->fetch()) {
                $productos[] = new Producto($row);
            }
	}
        
        self::$conexion=NULL;
        return $productos;
    }
    
    public static function obtieneProducto($codigo) {
 
        $valores = array('cod'=>$codigo);
        $sql = "SELECT cod, nombre_corto, nombre, PVP, familia FROM producto WHERE cod= :cod";
        
        $resultado = self::ejecutaConsulta ($sql,$valores);
        $producto = null;
	if(isset($resultado)) {
            $row = $resultado->fetch();
            $producto = new Producto($row);
	}
        self::$conexion=NULL;
        return $producto;    
    }
    
    public static function obtenerOrdenador($codigo) {
 
        $valores = array('cod'=>$codigo);
        $sql = "SELECT * FROM producto, ordenador WHERE producto.cod= :cod AND ordenador.cod= :cod";
        
        $resultado = self::ejecutaConsulta ($sql,$valores);
	if(isset($resultado)) {
            $row = $resultado->fetch();
	}
        self::$conexion=NULL;
        return $row;    
    }
    
    public static function productoOrdenador($codigo) {
 
        $valores = array('cod'=>$codigo);
        $sql = "SELECT nombre_corto, descripcion, pvp FROM producto WHERE cod= :cod";
        
        $resultado = self::ejecutaConsulta ($sql,$valores);
        $producto = null;
	if(isset($resultado)) {
            $row = $resultado->fetch();
	}
        return $row;    
    }
}
