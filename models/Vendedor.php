<?php


namespace Model;
class Vendedor extends ActiveRecord{
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }

    public function validar(){
        self::$errores = [];

        if(empty($this->nombre)){
            self::$errores[] = 'El nombre es requerido';
        }

        if(empty($this->apellido)){
            self::$errores[] = 'El apellido es requerido';
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = 'El teléfono debe de ser de 10 dígitos';
        }

        return self::$errores;
    }
}