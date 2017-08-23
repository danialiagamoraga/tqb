<?php
/*
Template Name: Portafolio
*/ ?>
<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

    <section id="portfolio-int" class="contenedor">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php $categorias = get_terms('proyectos', array('orderby' => 'term_id', 'hide_empty' => '1',));
            ?>

            <h1 class="titulo"><?php the_title(); ?></h1>
            <h2 class="subtitulo"><?php echo get_the_excerpt($post->ID); ?></h2>

            <div class="portfolio-items">

            <?php
            $args_portafolio = array(
                'post_type' => array('portafolio'),
                'nopaging' => true,
                'orderby' => date,
                'order' => DESC,
                'taxonomy' => 'servicios'
            );

            $seconds = 6;


            $query_portafolio = new WP_Query($args_portafolio);
            if ($query_portafolio->have_posts()) :
                while ($query_portafolio->have_posts()) : $query_portafolio->the_post(); ?>

                    <?php $tendencias = "";
                    $terms = get_the_terms($post->ID, 'proyectos');

                    // Loop over each item since it's an array
                    foreach ($terms as $term) {
                        // Print the name method from $term which is an OBJECT
                        $tendencias = $tendencia . $term->name;
                        // Get rid of the other data stored in the object, since it's not needed
                        unset($term);
                    }
                    $tendencias = rtrim( $tendencias, ', ' ); ?>


                    <figure class="item-portfolio wow fadeInUp"
                            data-wow-delay="<?php echo $seconds; ?>ms">
                        <?php echo get_the_post_thumbnail('', '', ''); ?>

                        <a href="<?php the_permalink() ?>" class="link-item"
                           title="<?php the_title_attribute(); ?>"></a>
                        <figcaption class="title-item">
                            <span><?php echo $tendencias; ?></span>
                            <h1><?php echo get_the_title(); ?></h1>
                        </figcaption>
                    </figure>
                    <?php $seconds+=2; endwhile;
                wp_reset_postdata(); ?>
                </div>
            <?php endif; endwhile; endif; ?>
    </section>

<?php require_once('productos.php'); ?>
<?php get_footer(); ?>