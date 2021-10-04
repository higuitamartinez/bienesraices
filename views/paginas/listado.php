
<div class="anuncios">
    <?php foreach($propiedades as $propiedad): ?>
    <div class="anuncio">
        <img src="imagenes/<?php echo($propiedad->imagen)?>" alt="Anuncio" loading="lazy">
        <div class="anuncio-contenido">
            <h3><?php echo($propiedad->titulo); ?></h3>
            <p><?php echo($propiedad->descripcion); ?></p>
            <p class="precio"><?php echo($propiedad->precio); ?></p>
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
            <a href="/anuncio?id=<?php echo($propiedad->id); ?>" class="btn btn-naranja dp-block">Ver propiedad</a>
        </div>
    </div><!-- .anuncio -->
    <?php endforeach; ?>
</div>