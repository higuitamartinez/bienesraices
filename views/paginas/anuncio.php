<main class="contenedor contenido-centrado anuncio-interna">
    <h1 class="text-center fw-300"><?php echo($propiedad->titulo); ?></h1>
    <img src="imagenes/<?php echo($propiedad->imagen); ?>" alt="Imagen propiedad">
    <p><?php echo($propiedad->descripcion); ?></p>
    <p class="precio">$<?php echo($propiedad->precio); ?></p>
    <div class="atributos">
        <div class="atributo">
            <img src="build/img/icono_wc.svg" alt="Atributo">
            <p><?php echo($propiedad->wc); ?></p>
        </div>

        <div class="atributo">
            <img src="build/img/icono_estacionamiento.svg" alt="Atributo">
            <p><?php echo($propiedad->estacionamiento); ?></p>
        </div>

        <div class="atributo">
            <img src="build/img/icono_dormitorio.svg" alt="Atributo">
            <p><?php echo($propiedad->habitaciones); ?></p>
        </div>
    </div><!-- .atributos -->
</main>