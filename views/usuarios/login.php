<main class="contenedor flex-1">
    <h1 class="text-center fw-300">Iniciar Sesión</h1>
    <?php if(!empty($errores)): ?>
        <?php foreach($errores as $error): ?>
            <div class="alerta error"><?php echo($error); ?></div>
        <?php endforeach; ?>
    <?php endif; ?>
    <form method="POST" class="formulario">
        <fieldset class="contenedor-campos">
            <legend>Información del usuario</legend>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" 
                name="usuario[email]" 
                id="email"
                value="<?php echo($usuario->email)?>" 
                placeholder="Email del usuario">
            </div>

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" 
                name="usuario[password]" 
                id="password"
                placeholder="Contraseña del usuario">
            </div>
        </fieldset>
        <div class="display-right">
            <input type="submit" value="Iniciar Sesión" class="btn btn-verde"> 
        </div>
    </form>
</main>