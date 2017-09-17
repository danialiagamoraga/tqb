<?php
get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="slider" class="contenedor wow fadeInUp ">

    <ul class="bxslider">
        <?php
        $args_slider = array(
            'post_type' => array('slider_inicio'),
            'nopaging' => true,
        );
        $query_slider = new WP_Query($args_slider); ?>
        <?php if ($query_slider->have_posts()) : ?>
            <?php while ($query_slider->have_posts()) : $query_slider->the_post(); ?>
                <li id="post-<?php the_ID(); ?>">
                    <figure class="crop">
                        <?php echo get_the_post_thumbnail(); ?>
                        <figcaption class="info">
                            <div class="title-content">
                                <div class="second-content">
                                    <h2><?php bloginfo('name'); ?>
                                        <?php if (has_excerpt()) {
                                            echo ' · ' . get_the_excerpt();
                                        } else {

                                        }; ?>

                                    </h2>
                                    <h1><?php the_title(); ?></h1>

                                    <?php
                                    $texto_boton = get_post_meta($post->ID, "texto_boton", true);
                                    $url_publicacion = get_post_meta($post->ID, "url_publicacion", true);


                                    if (!empty($texto_boton) && !empty($url_publicacion)) { ?>
                                        <a href="<?php echo $url_publicacion; ?>"
                                           title="<?php the_title_attribute(); ?>" class="permalink">
                                            <div><?php echo $texto_boton; ?>
                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    <?php } else { ?>
                                        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"
                                           class="permalink">
                                            <div>Ir al contenido
                                                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                            </div>
                                        </a>
                                    <?php }; ?>
                                </div>
                            </div>
                            <div class="giro">

                                <?php if ('' !== get_post()->post_content) {
                                    echo the_content();
                                } else {
                                    echo "Te quiero bonita · Peluquería";
                                }
                                ?>
                            </div>
                        </figcaption>
                    </figure>
                </li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>

</section>

<section id="about" class="contenedor">
    <article class="wow bounceInRight">
        <h2 class="subtitulo"><?php echo get_the_excerpt(112); ?></h2>
        <h1><?php echo get_the_title(112); ?></h1>
        <p><?php echo get_post_field('post_content', 112); ?></p>
        <a href="<?php the_permalink(112); ?>" class="boton">Quiero una cita
            <hr>
            <span>TQB</span> </a>
    </article>

    <figure class="wow bounceInLeft">
        <img src="<?php
        $image_id = get_post_thumbnail_id('112');
        $image_url = wp_get_attachment_image_src($image_id, 'full');
        echo $image_url[0]; ?>"
             alt="<?php the_title(); ?>">
    </figure>
</section>

<section id="portfolio" class="contenedor wow fadeInLeft" data-wow-delay="3 ms">

    <h1><?php echo get_the_title(20); ?></h1>
    <p><?php echo get_the_excerpt(20); ?></p>

    <div class="contenedor-catalogo">
        <?php
        $index = 1;
        $second = 1;
        $effects = "";

        // WP_Query arguments
        $args_lonuevo = array(
            'post_type' => array('portafolio'),
            'meta_key' => 'ver_en_inicio',
            'orderby' => 'rand',
            'posts_per_page' => 4,
            'meta_value' => 'yes',
        );

        // The Query
        $query_lonuevo = new WP_Query($args_lonuevo); ?>

        <?php if ($query_lonuevo->have_posts()) : ?>
            <?php while ($query_lonuevo->have_posts()) : $query_lonuevo->the_post();

                if ($second % 2 == 0) {
                    $effects = 'wow fadeInRight';

                } else {
                    $effects = ' wow fadeInLeft';
                }; ?>


                <?php if ($index == 1 || $index == 3): ?>
                    <div>
                <?php endif; ?>
                <div id="portafolio-<?= $index ?>" class="<?php echo $effects; ?>"
                     data-wow-delay="<?php echo $second; ?>ms">
                    <figure class="fig-portfolio">
                        <?php the_post_thumbnail(); ?>
                        <span class="bg-hover"></span>
                    </figure>
                </div>
                <?php if ($index == 2 || $index == 4): ?>
                    </div>
                <?php endif; ?>
                <?php $index++;
                $second += 1;endwhile; endif; ?>


        <!-- <div class="permalink-1">
            <a href="<?php the_permalink(20); ?>" class="per-content">Portafolio TQB</a>
        </div> -->
    </div>
</section>

<section id="servicios" class="wow fadeInUp" data-wow-delay="3 ms">
    <div class="bg-color-services"></div>
    <div class="contenedor">
        <article>
            <h1><?php echo get_the_title(22); ?></h1>
            <p><?php echo get_the_excerpt(22); ?></p>
        </article>

        <div id="slider-services">

            <?php $terms = get_terms('servicios');
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="taxonomy">';
                foreach ($terms as $term) {
                    echo '<li class="servicio ' . $term->slug . '">
                                <a href=" ' . esc_url(home_url('/')) . 'servicios/' . $term->slug . '">
                                    <img src="' . z_taxonomy_image_url($term->term_id, "thumbnail") . '"
                             class="thumb-services">
                                    <h1 class="title-gral">' . $term->name . '</h1>
                                    <p class="description">' . $term->description . '</p>
                                </a>
                           </li>';
                }
                echo '</ul>';
            } ?>

            <a href="#" class="control_next"></a>
            <a href="#" class="control_prev"></a>

        </div>
    </div>
</section>

<section id="blog" class="contenedor wow fadeInRight" data-wow-delay="3 ms">
    <h1><?php echo get_the_title(24); ?></h1>
    <p><?php echo get_the_excerpt(24); ?></p>

    <div>
        <?php
        // WP_Query arguments
        $args_blog = array(
            'showposts' => 3,
            'post_type' => post,
            'nopaging' => false,
            'orderby' => date,
            'order' => 'DESC',
        );
        // The Query
        $query_blog = new WP_Query($args_blog);
        $second = 3; ?>

        <?php query_posts($args_blog);
        while (have_posts()) :
            the_post(); ?>

            <article class="blog-content wow fadeInLeft" data-wow-delay="<?php echo $second ?>ms">
                <div>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h1>
                    <p><?php if (has_excerpt()) {
                            echo the_excerpt();
                        } else {
                            echo wp_trim_words(get_the_content(), 25, '...');
                        }; ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="boton">Leer más
                        <hr>
                        <span>TQB</span>
                    </a>
                </div>
            </article>
            <?php $second *= 2;
        endwhile;
        wp_reset_query() ?>
    </div>
    <a href="<?php echo esc_url(home_url('/')); ?>blog/" class="btn-blog">Ir al Blog</a>
</section>
<?php require_once('productos.php'); ?>
<?php get_footer(); ?>
