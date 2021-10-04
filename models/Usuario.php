<?php

namespace Model;

class Usuario extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        self::$errores = [];
        
        if($this->email === ''){
            self::$errores[] = 'El email es requerido';
        }

        if($this->password === ''){
            self::$errores[] = 'La contraseña es requerida';
        }

        return self::$errores;
    }

    public function consultarUsuario(){
        $query = "SELECT * FROM usuarios ";
        $query.= "WHERE email = '".$this->email. "';";
        $resultado = self::$db->query($query);

        if($resultado->num_rows){
            return $resultado->fetch_object();
        }
        self::$errores[]= 'El usuario no existe';
        return null;
    }

    public function validarPassword($usuarioDB){
        self::$errores[]= 'La contraseña es incorrecta';
        return password_verify($this->password, $usuarioDB->password);
    }

}