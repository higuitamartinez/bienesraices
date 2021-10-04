<main class="contenedor">
    <h1 class="text-center fw-300">Crear vendedor</h1>
    <?php if(!empty($errores)): ?>
        <?php foreach($errores as $error): ?>
            <div class="alerta error"><?php echo($error); ?></div>
        <?php endforeach;?>
    <?php endif; ?>

    <a href="/admin" class="btn btn-azul-vivo btn-light">Regresar</a>
    <form method="POST" class="formulario">
        <?php include('formulario_vendedores.php'); ?>
        <input type="submit" value="Crear vendedor" class="btn btn-verde">
    </form>
</main>