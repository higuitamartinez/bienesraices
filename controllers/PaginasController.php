<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Contacto;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;


class PaginasController{

    public static function index(Router $router){
        $propiedades = Propiedad::findLimit(3);
        $principal = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'principal' => $principal
        ]);
    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }

    public static function anuncios(Router $router){
        $propiedades = Propiedad::all();

        $router->render('paginas/anuncios', [
            'propiedades' => $propiedades
        ]);
    }

    public static function anuncio(Router $router){
        $id = redireccionar('/anuncios');
        $propiedad = Propiedad::findById($id);

        $router->render('paginas/anuncio', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $router->render('paginas/blog');
    }

    public static function contacto(Router $router){
        $mensaje = validarMensaje();
        $errores = [];
        $contacto = new Contacto();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $contacto = new Contacto($_POST['contacto']);
            $errores = $contacto->validar();

            if(empty($errores)){

                $contenido = "<html>";
                $contenido .="<p>Nombre: ".$contacto->nombre."</p>";
                $contenido .="<p>Email: ".$contacto->email."</p>";
                $contenido .="<p>Teléfono: ".$contacto->telefono."</p>";
                $contenido.="<p>Prefiere ser contactado por: ". ucfirst($contacto->comunicacion)."</p>";

                if($contacto->comunicacion === 'telefono'){
                    $contenido.="<p>En la fecha ".$contacto->fecha." a las ".$contacto->hora."</p>";
                }

                $contenido .="<p>Vende o Compra: ".ucfirst($contacto->informacion)."</p>";
                $contenido .="<p>Mensaje: ".$contacto->mensaje."</p>";
                $contenido .="<p>Precio o Presupuesto: $".$contacto->valor."</p>";

                $contenido.="</html>";


                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host= 'smtp.mailtrap.io';
                $mail->SMTPAuth=true;
                $mail->Username='42dad6243b0ff4';
                $mail->Password='af392db23359b2';
                $mail->SMTPSecure='tls';
                $mail->Port='2525';

                $mail->setFrom('admin@bienesraices.com', 'Admin');
                $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
                $mail->Subject = 'Nuevo correo de BienesRaices.com';
                
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                $mail->Body = $contenido;
                $mail->AltBody='Esto es el cuerpo secundario del email';
                $mail->send();

                header('Location: /contacto?mensaje=4');
            }
        }

        $router->render('paginas/contacto', [
            'contacto' => $contacto,
            'errores' => $errores,
            'mensaje' => $mensaje
        ]);
    }
}