<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController{
    public static function crear(Router $router){
        $vendedor = new Vendedor();
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor = new Vendedor($_POST['vendedor']);
            $errores = $vendedor->validar();

            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = redireccionar('/admin');
        $vendedor = Vendedor::findById($id);
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $vendedor->sincronizar($_POST['vendedor']);
            $errores = $vendedor->validar();

            if(empty($errores)){
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(validarTipo($_POST['tipo'])){
                $id = filter_Var($_POST['id'], FILTER_VALIDATE_INT);
                if($id){
                    $vendedor = Vendedor::findById($id);
                    $vendedor->delete();
                }
            }
        }
    }
}