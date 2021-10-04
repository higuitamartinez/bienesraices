<?php

namespace MVC;

class Router{
    public $rutasGET = [];
    public $rutasPOST = [];
    public $rutasProtegidas=['/admin', '/propiedades/crear', '/propiedades/actualizar', '/vendedores/crear', '/vendedores/actualizar', '/logout'];

    public $rutasNoSesion=['/login'];
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $session = $_SESSION['login'] ?? false;
        $urlActual = $_SERVER['PATH_INFO'] ?? '/'; //Compruebo ruta actual
        $metodo = $_SERVER['REQUEST_METHOD']; //Compruebo si es get o post

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if( (in_array($urlActual, $this->rutasProtegidas) && !$session) || (in_array($urlActual, $this->rutasNoSesion) && $session)){
            header('Location: /');
        }

        if($fn){
            call_user_func($fn, $this);
        }else{
            echo('Página no encontrada');
        }

    }

    public function render($view, $datos = []){ //$view = nomCarpeta/nomArchivo
        foreach($datos as $key => $value){ //Declarar los datos
            $$key = $value;
        }
        ob_start();
        include(__DIR__.'/views/'.$view.'.php');
        $contenido = ob_get_clean();
        include(__DIR__.'/views/layout.php');
    } 
}