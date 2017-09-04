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
    <?php endwhile; ?>
    <?php endif; ?>
</section>

<section id="staff" class="contenedor">
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
    <div class="contenedor-col">
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
            $flickr = get_post_meta($post->ID, "flickr", true);
            $vimeo = get_post_meta($post->ID, "vimeo", true);
            $youtube = get_post_meta($post->ID, "youtube", true);
            $snapchat = get_post_meta($post->ID, "snapchat", true);
            $deviantart = get_post_meta($post->ID, "deviantart", true);
            $soundcloud = get_post_meta($post->ID, "soundcloud", true);
            ?>

            <article class="integrante-tqb">
                <?php if (!empty($nombre)) { ?>
                    <h1 class="name-int"><?php echo $nombre; ?></h1>
                <?php }; ?>

                <?php if (!empty($cargo)) { ?>
                    <h2 class="cargo-int">· <?php echo $cargo; ?> ·</h2>
                <?php }; ?>

                <?php if (!empty($frase)) { ?>
                    <p class="description-int">"<?php echo $frase; ?>"</p>
                <?php }; ?>


                <ul class="rrss">
                    <?php if (!empty($facebook)) { ?>
                        <li class="facebook"><a href="<?php echo $facebook; ?>" target="_blank"><i
                                        class="fa fa-facebook"
                                        aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($twitter)) { ?>
                        <li class="twitter"><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"
                                                                                                 aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($instagram)) { ?>
                        <li class="instagram"><a href="<?php echo $instagram; ?>" target="_blank"><i
                                        class="fa fa-instagram"
                                        aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($pinterest)) { ?>
                        <li class="pinterest"><a href="<?php echo $pinterest; ?>" target="_blank"><i
                                        class="fa fa-pinterest-p"
                                        aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($tumblr)) { ?>
                        <li class="tumblr"><a href="<?php echo $tumblr; ?>" target="_blank"><i class="fa fa-tumblr"
                                                                                               aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($linkedin)) { ?>
                        <li class="linkedin"><a href="<?php echo $linkedin; ?>" target="_blank"><i
                                        class="fa fa-linkedin"
                                        aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($google)) { ?>
                        <li class="google"><a href="<?php echo $google; ?>" target="_blank"><i class="fa fa-google-plus"
                                                                                               aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($flickr)) { ?>
                        <li class="flickr"><a href="<?php echo $flickr; ?>" target="_blank"><i class="fa fa-flickr"
                                                                                               aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($vimeo)) { ?>
                        <li class="vimeo"><a href="<?php echo $vimeo; ?>" target="_blank"><i class="fa fa-vimeo"
                                                                                             aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($youtube)) { ?>
                        <li class="youtube"><a href="<?php echo $youtube; ?>" target="_blank"><i class="fa fa-youtube"
                                                                                                 aria-hidden="true"></i></a>
                        </li>
                    <?php } ?>

                    <?php if (!empty($snapchat)) { ?>
                        <li class="snapchat"><a href="<?php echo $snapchat; ?>" target="_blank"><i
                                        class="fa fa-snapchat" aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($deviantart)) { ?>
                        <li class="deviantart"><a href="<?php echo $deviantart; ?>" target="_blank"><i
                                        class="fa fa-deviantart" aria-hidden="true"></i></a></li>
                    <?php } ?>

                    <?php if (!empty($soundcloud)) { ?>
                        <li class="soundcloud"><a href="<?php echo $soundcloud; ?>" target="_blank"><i
                                        class="fa fa-soundcloud"
                                        aria-hidden="true"></i></a></li>
                    <?php } ?>
                </ul>

            </article>
        <?php endwhile; endif; ?>
    </div>
</section>

<?php require_once('productos.php'); ?>
<?php get_footer(); ?>
