<main class="contenedor contenido-centrado">
    <h1 class="text-center fw-300">Propiedades</h1>
    <?php if($mensaje): ?>
        <div class="alerta exito"><?php echo($mensaje); ?></div>
    <?php endif;?>
    <a href="/propiedades/crear" class="btn btn-verde">Crear propiedad</a>

    <ul class="lista-propiedades">
        <?php foreach($propiedades as $propiedad): ?>
            <li class="propiedad">
                <a href="/anuncio?id=<?php echo($propiedad->id);?>">
                    <div class="propiedad-contenido">
                        <img src="imagenes/<?php echo($propiedad->imagen);?>" alt="Imagen Propiedad" loading="lazy">
                        <div class="propiedad-informacion">
                            <h3><?php echo($propiedad->titulo);?></h3>
                            <p class="precio">$<?php echo($propiedad->precio);?></p>
                            <div class="atributos">
                                <div class="atributo">
                                    <img src="build/img/icono_wc.svg" alt="Atributo">
                                    <p><?php echo($propiedad->wc);?></p>
                                </div>

                                <div class="atributo">
                                    <img src="build/img/icono_estacionamiento.svg" alt="Atributo">
                                    <p><?php echo($propiedad->estacionamiento);?></p>
                                </div>

                                <div class="atributo">
                                    <img src="build/img/icono_dormitorio.svg" alt="Atributo">
                                    <p><?php echo($propiedad->habitaciones);?></p>
                                </div>
                            </div><!-- .atributos -->
                        </div>
                    </div><!-- .propiedad-contenido -->
                </a>
                <div class="propiedad-botones">
                    <a href="/propiedades/actualizar?id=<?php echo($propiedad->id); ?>" class="btn btn-azul">Actualizar</a>

                    <form action="/propiedades/eliminar" method="POST">
                        <input type="hidden" name="id" value="<?php echo($propiedad->id); ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" value="Eliminar" class="btn btn-rojo">
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul><!-- .lista-propiedades -->
</main>

<section class="contenedor contenido-centrado seccion">
    <h2 class="text-center fw-300">Vendedores</h2>
    <a href="/vendedores/crear" class="btn btn-verde">Crear vendedor</a>
    <ul class="lista-vendedores contenedor w-50">
        <?php foreach($vendedores as $vendedor): ?>
            <li class="vendedor">
                <div class="vendedor-contenido">
                    <h3><?php echo($vendedor->nombre.' '.$vendedor->apellido); ?></h3>
                    <div class="vendedor-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-phone" width="30" height="30" viewBox="0 0 24 24" stroke-width="1.5" stroke="#71b100" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                        </svg>
                        <p><?php echo($vendedor->telefono); ?></p>
                    </div>
                </div>
                <div class="vendedor-botones">
                    <a href="/vendedores/actualizar?id=<?php echo($vendedor->id);?>" class="btn btn-azul">Actualizar</a>

                    <form action="/vendedores/eliminar" method="POST" class="w-100">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="hidden" name="id" value="<?php echo($vendedor->id); ?>">
                        <input type="submit" value="Eliminar" class="btn btn-rojo">
                    </form>
                </div>
            </li>
        <?php endforeach; ?>
    </ul><!--.lista-vendedores-->
</section>