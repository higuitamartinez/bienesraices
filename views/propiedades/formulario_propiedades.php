
    <fieldset class="contenedor-campos">
        <legend>Datos de la propiedad</legend>
        <div class="campo">
            <label for="titulo">Título</label>
            <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Título de la propiedad" value="<?php echo($propiedad->titulo); ?>">
        </div>
        <div class="campo">
            <label for="imagen">Imagen</label>
            <input type="file" name="propiedad[imagen]" id="imagen">
        </div>
        <?php if(!empty($propiedad->imagen)):?>
            <img src="../imagenes/<?php echo($propiedad->imagen); ?>" alt="Imagen propiedad" class="formulario-imagen">
        <?php endif;?>
        <div class="campo">
            <label for="descripcion">Descripción</label>
            <textarea name="propiedad[descripcion]" id="descripcion"><?php echo($propiedad->descripcion); ?></textarea>
        </div>
        <div class="campo">
            <label for="precio">Precio:</label>
            <input type="number" placeholder="Precio de la propiedad" name="propiedad[precio]" id="precio" value="<?php echo($propiedad->precio); ?>">
        </div>
    </fieldset>

    <fieldset class="contenedor-campos">
        <legend>Información de su interior</legend>
        <div class="campo">
            <label for="habitaciones">Habitaciones</label>
            <input type="number" min="1" placeholder="Ej: 3" name="propiedad[habitaciones]" id="habitaciones" value="<?php echo($propiedad->habitaciones); ?>">
        </div>
        <div class="campo">
            <label for="wc">Baños</label>
            <input type="number" min="1" placeholder="Ej: 3" name="propiedad[wc]" id="wc" value="<?php echo($propiedad->wc); ?>">
        </div>

        <div class="campo">
            <label for="estacionamiento">Estacionamientos</label>
            <input type="number" min="1" placeholder="Ej: 3" name="propiedad[estacionamiento]" id="estacionamiento" value="<?php echo($propiedad->estacionamiento); ?>">
        </div>
    </fieldset>

    <fieldset class="contenedor-campos">
        <legend>Información del vendedor</legend>
        <div class="campo">
            <label for="vendedorId">Vendedor</label>
            <select name="propiedad[vendedorId]" id="vendedorId">
                <option value="0" selected disabled>--Seleccionar Vendedor--</option>
                <?php foreach($vendedores as $vendedor): ?>
                    <option value="<?php echo($vendedor->id); ?>" <?php echo($propiedad->vendedorId === $vendedor->id ? 'selected':''); ?>><?php echo($vendedor->nombre.' '.$vendedor->apellido); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>