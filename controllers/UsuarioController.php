<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class UsuarioController{
    public static function login(Router $router){
        $usuario = new Usuario();
        $errores = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $usuario = new Usuario($_POST['usuario']);
            $errores = $usuario->validar();

            if(empty($errores)){
                $usuarioDB = $usuario->consultarUsuario();
                if($usuarioDB){
                    if($usuario->validarPassword($usuarioDB)){
                       session_start();
                       $_SESSION['login'] = true;
                       $_SESSION['email'] = $usuario->email;

                       header('Location: /admin');
                    }
                }
                $errores = $usuario->getErrores();
            }
        }

        $router->render('usuarios/login', [
            'usuario' => $usuario,
            'errores' => $errores
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];

        header('Location: /');
    }
}