<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

    <section id="search" class="contenedor">
        <?php if (have_posts()) : ?>
            <h1 class="titulo">Resultados de Búsqueda</h1>
            <h2 class="subtitulo"><?php printf(__('Mostrando resultados de búsqueda para: %s', 'TQB'), '<a>' . get_search_query() . '</a>'); ?></h2>

            <?php while (have_posts()) : the_post(); ?>

                <article class="search-result wow fadeInUp" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" class="link"><?php the_title(); ?></a></h2>
                    <h4><?php the_category(' / '); ?></h4>
                </article>

            <?php endwhile; ?>


        <?php else : ?>

            <h1 class="titulo">Resultados de Búsqueda</h1>
            <h2 class="subtitulo"><?php printf(__('Resultados de Busqueda para: %s', 'Dani Aliaga'), '<a>' . get_search_query() . '</a>'); ?></h2>


            <article class="block wow fadeInUp">
                <p class="cat-cloud">No hay resultados asociados a tu búsqueda. Intenta nuevamente.</p>
            </article>
        <?php endif; ?>
        <div class="btn wow fadeInUp">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="boton">Volver al inicio
                <hr>
                <span>TQB</span></a>
        </div>

    </section>


    <!-- /search -->

<?php get_footer(); ?>