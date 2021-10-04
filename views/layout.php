<?php 
if(!isset($_SESSION)){
    session_start();
}
$session = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/build/css/app.css" rel="stylesheet">
    <title>Bienes Raíces</title>
</head>
<body>
    <header class="header <?php echo(isset($principal) ? 'principal': '')?>">
        <div class="contenedor contenido-header">
            <div class="dark-mode">
                <img src="/build/img/dark-mode.svg" 
                alt="Dark Mode"
                id="btn-dark">
            </div>
            <div class="barra">
                <a href="/"><img src="/build/img/logo.svg" alt="Logo" class="logo"></a>
                <img src="/build/img/barras.svg" alt="Barras" id="btn-barras">
                <nav class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/anuncios">Anuncios</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <?php if($session): ?>
                        <a href="/admin">Admin</a>
                        <a href="/logout">Cerrar Sesión</a>
                    <?php else:?>
                        <a href="/login">Iniciar Sesión</a>
                    <?php endif; ?>
                </nav>
            </div>
            <?php if(isset($principal)): ?>
                    <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php endif; ?>
        </div><!-- .contenido-header -->
    </header>
    <?php echo($contenido); ?>
    <footer class="footer">
        <div class="contenedor">
            <nav class="navegacion seleccionado">
                <a href="/nosotros">Nosotros</a>
                <a href="/anuncios">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
                <?php if($session): ?>
                    <a href="/admin">Admin</a>
                    <a href="/logout">Cerrar Sesión</a>
                <?php else:?>
                    <a href="/login">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>
            <p>Todos los derechos Reservados <?php echo(date('Y')); ?> &copy</p>
        </div>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>
</html>