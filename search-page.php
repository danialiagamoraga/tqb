<?php
/*
Template Name: Formulario de Búsqueda
*/
get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>
<section id="search" class="contenedor">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="titulo"><?php the_title(); ?></h1>
        <h2 class="subtitulo"><?php echo get_the_excerpt($post->ID); ?></h2>

        <?php get_search_form(); ?>

    <?php endwhile; endif; ?>
</section>
<?php get_footer(); ?>
