<fieldset class="contenedor-campos">
    <legend>Datos del vendedor</legend>
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text"
        name="vendedor[nombre]"
        id="nombre"
        value="<?php echo($vendedor->nombre); ?>"
        placeholder="Nombre del vendedor">
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input type="text"
         name="vendedor[apellido]"
          id="apellido"
          value="<?php echo($vendedor->apellido); ?>"
          placeholder="Apellido del vendedor">
    </div>
</fieldset>
<fieldset class="contenedor-campos">
    <legend>Datos de contacto</legend>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input type="tel"
        name="vendedor[telefono]"
        id="telefono"
        value="<?php echo($vendedor->telefono); ?>"
        placeholder="Teléfono del vendedor">
    </div>
</fieldset>