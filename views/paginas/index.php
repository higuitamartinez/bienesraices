
<section class="contenedor">
    <h2 class="text-center fw-300">Más sobre Nosotros</h2>

    <?php include('iconos.php'); ?>
</section>

<main class="contenedor seccion">
    <h2 class="text-center fw-300">Casas y Depas en Venta</h2>

    <?php include(__DIR__.'/listado.php'); ?>

    <div class="todas">
        <a href="/anuncios" class="btn btn-verde">Ver Todas</a>
    </div>
</main>

<section class="intermedio seccion">
    <div class="contenedor intermedio-contenido">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="/contacto" class="btn btn-naranja">Contáctanos</a>
    </div>
</section>

<section class="contenedor seccion">
    <div class="aside">
        <div class="blog">
            <h3 class="text-center fw-300">Nuestro Blog</h3>
            <article class="entrada">
                <picture>
                    <source srcset="build/img/blog1.webp" alt="Entrada" loading="lazy">
                    <img src="build/img/blog1.jpg" alt="Entrada" loading="lazy">
                </picture>
                <div class="entrada-contenido">
                    <a href="#">
                        <h4 class="entrada-titulo">Terraza en el techo de tu casa</h4>
                        <p class="entrada-informacion">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de casa con los mejor materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article><!-- .entrada -->

            <article class="entrada">
                <picture>
                    <source srcset="build/img/blog2.webp" alt="Entrada" loading="lazy">
                    <img src="build/img/blog2.jpg" alt="Entrada" loading="lazy">
                </picture>
                <div class="entrada-contenido">
                    <a href="#">
                        <h4 class="entrada-titulo">Terraza en el techo de tu casa</h4>
                        <p class="entrada-informacion">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>
                        <p>Consejos para construir una terraza en el techo de casa con los mejores materiales y ahorrando dinero</p>
                    </a>
                </div>
            </article><!-- .entrada -->
        </div><!-- .blog -->

        <section class="testimonial">
            <h3 class="text-center fw-300">Testimoniales</h3>
            <div class="testimonial-contenido">
                <blockquote>El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.</blockquote>
                <p class="testimonial-autor">- Sebastian Higuita</p>
            </div>
        </section>
    </div>
</section>