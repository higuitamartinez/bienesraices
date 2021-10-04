<?php

namespace Model;

class ActiveRecord{
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];
    protected static $errores;

    public static function setDB($database){
        self::$db = $database;
    }

    public function getErrores(){
        return static::$errores;
    }

    private function mapearAtributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === 'id'){
                continue;
            }
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    private function sanitizarAtributos(){
        $atributos = $this->mapearAtributos();
        $sanitizados = [];

        foreach($atributos as $key => $value){
            $sanitizados[$key] = self::$db->escape_string($value);
        }

        return $sanitizados;
    }

    //Mi segundo constructor que va a recibir args
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    private static function crearObjeto($registro){
        $objeto = new static;
        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }


    //Consultar SQL y Formar objeto
    protected static function consultarDB($query){
        $resultado = self::$db->query($query);
        $array = [];

        while($registro = $resultado->fetch_assoc()){
            $array[] = self::crearObjeto($registro);
        }

        $resultado->free();
        return $array;
    }



    //CRUD
    public function guardar(){
        if(empty($this->id)){
            $this->create();
        }else{
            $this->update();
        }
    }

    public function create(){
        $atributos = $this->sanitizarAtributos();
        
        $keys = join(",",array_keys($atributos));
        $values = join("','", array_values($atributos));

        $query = "INSERT INTO ".static::$tabla." (";
        $query .= $keys.") values ('";
        $query.= $values."');";

        $resultado = self::$db->query($query);

        if($resultado){
            header('Location: /admin?mensaje=1');
        }
    }

    public static function all(){
        $query = "SELECT * FROM ".static::$tabla.";";
        $select = self::consultarDB($query);

        return $select;
    }

    public static function findLimit($limit){
        $query = "SELECT * FROM ".static::$tabla;
        $query.=" LIMIT ".$limit.";";
        
        $select = self::consultarDB($query);
        return $select;
    }

    public static function findById($id){
        $query = "SELECT * FROM ".static::$tabla;
        $query.= " WHERE id=".$id.";";

        $select = self::consultarDB($query);
        return array_shift($select);
    }

    public function update(){
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[]="${key}='${value}'";
        }
        $valores = join(', ', $valores);

        $query = "UPDATE ".static::$tabla. " SET ";
        $query.= $valores." WHERE ";
        $query.= "id=".self::$db->escape_string($this->id).';';

        $resultado = self::$db->query($query);

        if($resultado){
            header('Location: /admin?mensaje=2');
        }
    }

    public function delete(){
        $query = "DELETE FROM ".static::$tabla;
        $query.= " WHERE id=".self::$db->escape_string($this->id);

        $resultado = self::$db->query($query);

        if($resultado){
            header('Location: /admin?mensaje=3');
        }
    }
}