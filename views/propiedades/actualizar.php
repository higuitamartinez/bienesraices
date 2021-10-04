<main class="contenedor">
    <h1 class="text-center fw-300">Actualizar Propiedad</h1>
    <?php if(!empty($errores)):?>
        <?php foreach($errores as $error): ?>
            <div class="alerta error"><?php echo($error); ?></div>
        <?php endforeach;?>
    <?php endif; ?>
    <a href="/admin" class="btn btn-azul-vivo btn-light">Regresar</a>
    <form method="POST" enctype="multipart/form-data" class="formulario" >
        <?php include('formulario_propiedades.php'); ?>
        <input type="submit" value="Actualizar propiedad" class="btn btn-verde">
    </form>
</main>