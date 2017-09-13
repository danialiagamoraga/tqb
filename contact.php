<?php
/*
Template Name: Contacto
*/ ?>
<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="contact" class="contenedor">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="titulo"><?php the_title(); ?></h1>
        <h2 class="subtitulo"><?php echo get_the_excerpt($post->ID); ?></h2>

        <div class="contenedor-col wow fadeInUp">
            <article>
                <?php the_content(); ?>
            </article>

            <div id="contact-form">
                <?php echo do_shortcode('[contact-form-7 id="309" title="Contacto Te Quiero Bonita"]'); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>

</section>
<?php require_once('productos.php'); ?>
<?php get_footer(); ?>


