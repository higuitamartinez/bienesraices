<?php

namespace Controllers;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    public static function admin(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $mensaje = validarMensaje();

        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'mensaje' => $mensaje
        ]);
    }

    public static function crear(Router $router){
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $maxSize    = 2097152;
            $propiedad = new Propiedad($_POST['propiedad']);
            $errores = $propiedad->validar();

            if(empty($_FILES['propiedad']['tmp_name']['imagen'])){
                $errores[] = 'La imagen es requerida'; 
            }else if($_FILES['propiedad']['size']['imagen'] > $maxSize){
                $errores[] = 'La imagen es muy pesada';
            }

            if(empty($errores)){
                $nombreImagen = (uniqid(rand(), true)).'.jpg';
                $propiedad->setImagen($nombreImagen);
                $propiedad->creado = date('Y-m-d');

                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                $image->save(CARPETA_IMAGENES.$nombreImagen);

                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router){
        $id = redireccionar('/admin');
        $propiedad = Propiedad::findById($id);
        $vendedores = Vendedor::all();
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $maxSize    = 2097152;
            $propiedad->sincronizar($_POST['propiedad']);
            $errores = $propiedad->validar();

            if(!empty($_FILES['propiedad']['tmp_name']['imagen'])){
                if($_FILES['propiedad']['size']['imagen'] > $maxSize){
                    $errores[] = 'La imagen es muy pesada';
                }
            }

            if(empty($errores)){
                if(!empty($_FILES['propiedad']['tmp_name']['imagen'])){
                    $nombreImagen = (uniqid(rand(), true)).'.jpg';
                    $propiedad->setImagen($nombreImagen);
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                    $image->save(CARPETA_IMAGENES.$nombreImagen);
                }
                $propiedad->guardar();                
            }

        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(validarTipo($_POST['tipo'])){
                $id = filter_var($_POST['id'], FILTER_VALIDATE_INT);
                if($id){
                    $propiedad = Propiedad::findById($id);
                    $propiedad->borrarImagen($propiedad->imagen);
                    $propiedad->delete();
                }
            }
        }
    }
}