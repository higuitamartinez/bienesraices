<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'].'/imagenes/');

function debuguear($elemento){
    echo('<pre>');
    var_dump($elemento);
    echo('</pre>');
    exit;
}

function s($html){
    $s =htmlspecialchars($html);
    return $s;
}

function redireccionar(string $url){
    $id = $_GET['id'] ?? null;
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }
    return $id;
}

function validarTipo($tipo){
    $tipos = ['propiedad', 'vendedor'];
    return in_array($tipo, $tipos);
}


function validarMensaje(){
    $codigo = $_GET['mensaje'] ?? null;

    if($codigo){
        $mensaje = null;

        switch($codigo){
            case '1':
                $mensaje='Creado correctamente';
                break;
            case '2':
                $mensaje='Actualizado correctamente';
                break;
            case '3':
                $mensaje='Eliminado correctamente';
                break;
            case '4':
                $mensaje = 'Enviado correctamente';
                break;
            default:
                return null;
                break;
        }
    
        return $mensaje;
    }
    return null;
}