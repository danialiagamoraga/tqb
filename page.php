<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section class="contenedor" id="pages">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>
        <h1 class="titulo"><?php the_title(); ?></h1>
        <h2 class="subtitulo"><?php echo get_the_excerpt($post->ID); ?></h2>
        <div class="wow fadeInUp"><?php the_content(); ?></div>
        <?php the_post_thumbnail(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
</section>
<?php require_once('productos.php'); ?>
<?php get_footer(); ?>
