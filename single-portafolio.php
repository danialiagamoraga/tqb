<?php
/*
Template Name: Portafolio
*/ ?>
<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

    <section id="portfolio-int" class="contenedor">
        <?php if (have_posts()) : $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy')); ?>
            <h1 class="titulo"><?php echo get_the_title(20); ?></h1>
            <h2 class="subtitulo"><?php the_title(); ?> · Te quiero Bonita</h2>

            <?php while (have_posts()) : the_post(); ?>

                <?php
                $service = get_post_meta($post->ID, "detail-proyect", true);
                $year = get_post_meta($post->ID, "año", true);
                $photographer = get_post_meta($post->ID, "photographer", true);
                $portfolio = get_post_meta($post->ID, "photographer-url", true); ?>

                <section class="portfolio-detail contenedor">
                    <h1 class="titulo-detail"><?php the_title(); ?></h1>
                    <article class="contenido-portafolio">
                        <div class="contenido">
                            <?php the_content(); ?>
                        </div>
                        <div class="info-complementaria">
                            <p><span class="cat">Servicio </span><span class="name"><?php echo $service; ?></span></p>
                            <p><span class="cat">Año </span> <span class="name"><?php echo $year; ?></span></p>
                            <p><span class="cat">Fotógrafo </span><span class="name"><span><a href="<?php echo $portfolio; ?>" target="_blank"><?php echo $photographer; ?></a></span></p>
                        </div>
                    </article>
                    <figure>
                        <?php echo get_the_post_thumbnail('', '', ''); ?>
                    </figure>
                </section>

            <?php endwhile;
            wp_reset_postdata(); ?>
        <?php endif; ?>

    </section>
    <div class="navigation">
        <div class="contenedor contenedor-col">
            <div><?php previous_post_link(); ?></div>
            <div class="blog-name"><a href="<?php echo esc_url(home_url('/')); ?>portafolio/">Portafolio TQB</a></div>
            <div><?php next_post_link(); ?></div>
        </div>
    </div>
<?php get_footer(); ?>