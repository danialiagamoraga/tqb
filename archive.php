<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="blog-template" class="contenedor">
    <?php if (have_posts()) : ?>
        <?php /* If this is a category archive */
        if (is_category()) { ?>
            <h1 class="titulo"><?php single_cat_title(); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Categorías</h3>
            <?php /* If this is a tag archive */
        } elseif (is_tag()) { ?>
            <h1 class="titulo"><?php single_tag_title(); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Etiquetas</h3>
            <?php /* If this is a daily archive */
        } elseif (is_day()) { ?>
            <h1 class="titulo"><?php the_time('F jS, Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Contenido diario</h3>
            <?php /* If this is a monthly archive */
        } elseif (is_month()) { ?>
            <h1 class="titulo"><?php the_time('F, Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Contenido mensual</h3>
            <?php /* If this is a yearly archive */
        } elseif (is_year()) { ?>
            <h1 class="titulo"><?php the_time('Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Contenido anual</h3>
            <?php /* If this is an author archive */
        } elseif (is_author()) { ?>
            <h1 class="titulo"><?php the_author(); ?> </h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita · Contenido por autor</h3>
            <?php /* If this is a paged archive */
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1 class="titulo">Blog TQB</h1>
            <h3 class="subtitulo">TENDENCIAS EN LOOK, MAQUILLAJE Y PEINADO DE LA MANO DEL STAFF DE TQB.</h3>
        <?php } ?>
    <?php endif; ?>


    <div id="thumb" class="thumb-content">
        <?php while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID() ?>" class="tqb-<?php echo $index ?> wow fadeInLeft"
                     data-wow-delay="<?php echo $seconds ?>ms">
                <figure>
                    <a href="<?php the_permalink(); ?>">
                        <!--<div class="blog-hover"><h3>Leer publicacion</h3></div> -->
                        <?php the_post_thumbnail() ?>
                        <figcaption>
                            <h2><?php the_tags('#TQB: '); ?></h2>
                            <h1><?php the_title() ?></h1>
                        </figcaption>
                    </a>
                </figure>
            </article>
            <?php $index++;
            $seconds *= 2.5;endwhile; ?>
    </div>
</section>
<div class="navigation">
    <div class="contenedor contenedor-col">
        <div><?php previous_posts_link(); ?></div>
        <div class="blog-name"><a href="<?php echo esc_url(home_url('/')); ?>blog/">TQB BLOG</a></div>
        <div><?php next_posts_link(); ?></div>
    </div>
</div>
<?php require_once('sub-footer.php'); ?>
<?php get_footer(); ?>