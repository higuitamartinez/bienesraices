<?php

namespace Model;

class Contacto{
    public $nombre;
    public $email;
    public $telefono;
    public $mensaje;
    public $informacion;
    public $valor;
    public $comunicacion;
    public $fecha;
    public $hora;

    private static $errores = [];

    public function __construct($args = []){
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->mensaje = $args['mensaje'] ?? '';
        $this-> informacion = $args['informacion'] ?? '';
        $this->valor = $args['valor'] ?? '';
        $this->comunicacion = $args['comunicacion'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
    }

    public function validar(){
        self::$errores=[];

        if(empty($this->nombre)){
            self::$errores[] = 'El nombre es requerido';
        }

        if(empty($this->email)){
            self::$errores[] = 'El email es requerido';
        }

        if(!preg_match('/[0-9]{10}/',$this->telefono)){
            self::$errores[] = 'El teléfono debe de ser de 10 dígitos';
        }

        if(empty($this->mensaje)){
            self::$errores[] = 'El mensaje es requerido';
        }

        if(empty($this->informacion)){
            self::$errores[] = 'Vende o compra es requerido';
        }

        if(!filter_var($this->valor, FILTER_VALIDATE_FLOAT)){
            self::$errores[] = 'El presupuesto o precio es requerido';
        }
        
        if(empty($this->comunicacion)){
            self::$errores[] = 'La forma de comunicación es requerida';
        }
        else if($this->comunicacion === 'telefono'){
            if(empty($this->fecha)){
                self::$errores[] = 'La fecha es requerida';
            }

            if(empty($this->hora)){
                self::$errores[] = 'La hora es requerida';
            }
        }

        return self::$errores;
    }
}