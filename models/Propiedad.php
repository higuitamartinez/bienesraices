<?php
namespace Model;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = $args['creado'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar(){
        self::$errores = [];

        if(empty($this->titulo)){
            self::$errores[] = 'El título es requerido';
        }

        if(!filter_var($this->precio,FILTER_VALIDATE_FLOAT)){
            self::$errores[] = 'El precio no es válido';
        }

        if(strlen($this->descripcion)<100){
            self::$errores[] = 'La descripción debe tener mínimo 100 letras';
        }

        if(!filter_var($this->habitaciones, FILTER_VALIDATE_INT)){
            self::$errores[] = 'El número de habitaciones no es válido';
        }

        if(!filter_var($this->wc, FILTER_VALIDATE_INT)){
            self::$errores[] = 'El número de baños no es válido';
        }

        if(!filter_var($this->estacionamiento, FILTER_VALIDATE_INT)){
            self::$errores[] = 'El número de estacionamientos no es válido';
        }

        if(!filter_var($this->vendedorId, FILTER_VALIDATE_INT)){
            self::$errores[] = 'El código del vendedor no es válido';
        }

        return self::$errores;
    }

    public function setImagen($nombreImagen){
        if(!empty($this->id)){
            $this->borrarImagen($this->imagen);
        }
        $this->imagen = $nombreImagen;
    }

    public function borrarImagen($nombreImagen){
        if(file_exists(CARPETA_IMAGENES.$nombreImagen)){
            unlink(CARPETA_IMAGENES.$nombreImagen);
        }
    }

}