<main class="contenedor">
    <h1 class="text-center fw-300">Contacto</h1>
    <picture>
        <source srcset="../build/img/destacada3.webp" type="image/webp" loading="lazy">
        <img src="../build/img/destacada3.jpg" alt="Imagen Contacto" loading="lazy">
    </picture>
    <h2 class="text-center fw-300">Llena el formulario para Contactarnos</h2>
    <?php if(count($errores) > 0):?>
        <?php for($i = 0; $i < count($errores); $i+=1): ?>
            <div class="alerta error"><?php echo($errores[$i]); ?></div>
        <?php endfor; ?>
    <?php endif;?>

    <?php if($mensaje): ?>
        <div class="alerta exito"><?php echo($mensaje); ?></div>
    <?php endif;?>
    <form method="POST" class="formulario">
        <fieldset class="contenedor-campos">
            <legend>Información Personal</legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                type="text"
                name="contacto[nombre]"
                id="nombre"
                value="<?php echo($contacto->nombre); ?>"
                placeholder="Tu Nombre">
            </div>

            <div class="campo">
                <label for="email">E-Mail</label>
                <input 
                type="email"
                name="contacto[email]"
                id="email"
                value="<?php echo($contacto->email); ?>"
                placeholder="Tu Email">
            </div>

            <div class="campo">
                <label for="telefono">Teléfono</label>
                <input 
                type="tel"
                name="contacto[telefono]"
                id="telefono"
                value="<?php echo($contacto->telefono); ?>"
                placeholder="Tu Teléfono">
            </div>

            <div class="campo">
                <label for="mensaje">Mensaje</label>
                <textarea
                name="contacto[mensaje]"
                id="mensaje"
                ><?php echo($contacto->mensaje); ?></textarea>
            </div>
        </fieldset>
        <fieldset class="contenedor-campos">
            <legend>Información sobre la propiedad</legend>
            <div class="campo">
                <label for="informacion">Vende o compra</label>
                <select name="contacto[informacion]" id="infomacion">
                    <option value="0" selected disabled>-- Seleccione --</option>
                    <option value="compra" <?php echo( $contacto->informacion === 'compra' ? 'selected' : ''); ?>>Compra</option>
                    <option value="vende" <?php echo( $contacto->informacion === 'vende' ? 'selected' : ''); ?>>Vende</option>
                </select>
            </div>
            <div class="campo">
                <label for="valor">Precio o presupuesto</label>
                <input 
                type="number"
                name="contacto[valor]"
                id="valor"
                value="<?php echo($contacto->valor); ?>"
                placeholder="Tu Precio o Presupuesto">
            </div>
        </fieldset>

        <fieldset class="contenedor-campos">
            <legend>Información sobre la propiedad</legend>
            <div class="contacto">
                <p>Como desea ser contactado</p>
                <div class="comunicacion-contacto">
                    <div class="comunicacion">
                        <label for="comunicacion-telefono">Teléfono</label>
                        <input
                        type="radio"
                        name="contacto[comunicacion]"
                        id="comunicacion-telefono"
                        value="telefono"
                        <?php echo( $contacto->comunicacion === 'telefono' ? 'checked' : ''); ?>>
                    </div>
                    <div class="comunicacion">
                        <label for="comunicacion-email">E-mail</label>
                        <input
                        type="radio"
                        name="contacto[comunicacion]"
                        id="comunicacion-email"
                        value="email"
                        <?php echo( $contacto->comunicacion === 'email' ? 'checked' : ''); ?>>
                    </div>
                </div>
                <?php if($contacto->comunicacion==='telefono'): ?>
                    <div id="externos">
                        <div class="campo">
                            <label for="fecha">Fecha</label>
                            <input
                            type="date"
                            name="contacto[fecha]"
                            id="fecha"
                            value="<?php echo($contacto->fecha); ?>"
                            >
                        </div>
                        <div class="campo">
                            <label for="hora">Hora</label>
                            <input
                            type="time"
                            name="contacto[hora]"
                            id="hora"
                            value="<?php echo($contacto->hora); ?>"
                            >
                        </div>
                    </div>
                <?php endif;?>
            </div><!--.contacto-->
        </fieldset>
        <input 
        type="submit"
        value="Enviar"
        class="btn btn-verde">
    </form>
</main>