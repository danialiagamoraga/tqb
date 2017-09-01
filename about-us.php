<?php
/*
Template Name: Corporativa
*/
get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section class="contenedor" id="pages">
    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>
        <h1 class="titulo"><?php the_title(); ?></h1>
        <h2 class="subtitulo"><?php echo get_the_excerpt($post->ID); ?></h2>
        <?php the_content(); ?>
        <?php the_post_thumbnail(); ?>
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section id="staff" class="contenedor">

    <h1 class="titulo">Staff TQB</h1>

    <?php
    // WP_Query arguments
    $args_staff = array(
        'post_type' => array('tqb-staff'),
        'nopaging' => false,
        'orderby' => rand,
        'order' => ASC,
    );
    // The Query
    $query_productos = new WP_Query($args_staff); ?>
    <div>
        <?php if ($query_productos->have_posts()) : while ($query_productos->have_posts()) : $query_productos->the_post(); ?>

            <?php
            $nombre = get_post_meta($post->ID, "nombre", true);
            $cargo = get_post_meta($post->ID, "rol", true);
            $frase = get_post_meta($post->ID, "frase", true);

            $facebook = get_post_meta($post->ID, "facebook", true);
            $twitter = get_post_meta($post->ID, "twitter", true);
            $instagram = get_post_meta($post->ID, "instagram", true);
            $pinterest = get_post_meta($post->ID, "pinterest", true);
            $tumblr = get_post_meta($post->ID, "tumblr", true);
            $linkedin = get_post_meta($post->ID, "linkedin", true);
            $google = get_post_meta($post->ID, "google+", true);
            $flicker = get_post_meta($post->ID, "flicker", true);
            $vimeo = get_post_meta($post->ID, "vimeo", true);
            $youtube = get_post_meta($post->ID, "youtube", true);
            $soundcloud = get_post_meta($post->ID, "soundcloud", true);

            ?>

            <article class="integrante-tqb">
                <?php if (isset($nombre)) { ?>
                    <h1 class="name-int"><?php echo $nombre; ?></h1>
                <?php }; ?>

                <?php if (isset($cargo)) { ?>
                    <h2 class="cargo-int"><?php echo $cargo; ?></h2>
                <?php }; ?>

                <ul class="rrss">
                    <?php if (isset($facebook)) { ?>
                        <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <?php } ?>
                </ul>

                <?php if (isset($frase)) { ?>
                    <h1><?php echo $frase; ?></h1>
                <?php }; ?>

            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php require_once('productos.php'); ?>
<?php get_footer(); ?>
