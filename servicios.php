<?php
/*
Template Name: Servicios
*/ ?>

<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="servicio-int" class="contenedor">

    <?php if (have_posts()) : while (have_posts()) :
        the_post(); ?>
        <h1 class="titulo"><?php the_title(); ?></h1>

        <?php $categorias = get_terms('servicios', array('orderby' => 'term_id', 'hide_empty' => '1',));
        ?>

        <div class="filter_services contenedor">
            <ul>
                <li class="item-services"><a href="#" class="selected">Servicios TQB</a></li>
                <?php
                foreach ($categorias as $categoria) {
                    echo '<li class="item-services"><a href="' . get_term_link($categoria) . '">' . $categoria->name . '</a></li>';
                }
                ?>
            </ul>
        </div>


        <ul class="services_list contenedor">
        <?php

        $args_servicios = array(
            'post_type' => array('servicios-tqb'),
            'nopaging' => true,
            'order' => 'ASC',
            'orderby' => 'title',
            'taxonomy' => 'servicios'
        );

        $seconds= 1;

        $query_servicios = new WP_Query($args_servicios);
        if ($query_servicios->have_posts()) :
            while ($query_servicios->have_posts()) : $query_servicios->the_post(); ?>
                <?php
                $description = get_post_meta($post->ID, "description", true);
                $price = get_post_meta($post->ID, "price", true);
                $discount = get_post_meta($post->ID, "discount", true);
                $since = get_post_meta($post->ID, "since", true);
                ?>

                <li class="servicio-<?php echo get_the_title(); ?> wow fadeInDown" data-wow-delay="<?php echo $seconds ?>ms">
                    <h1><?php echo get_the_title(); ?>
                        <?php if (!empty($discount)) { ?>
                            <span class="discount-notice">Servicio con descuento</span>
                        <?php }; ?>
                    </h1>
                    <div>
                        <div class="item-description">
                            <?php if (!empty($description)) { ?>
                                <p><?php echo $description; ?></p>
                            <?php } else { ?>
                                <p>Servicios Te quiero Bonita</p>
                            <?php } ?>
                        </div>

                        <?php if (!empty($price)) { ?>
                            <div class="item-price">
                                <?php if (!empty($discount)) { ?>
                                    <h2 class="discount">$<?php echo number_format($discount, 0, '', '.'); ?></h2>
                                    <h2 class="price tachado">$<?php echo number_format($price, 0, '', '.'); ?></h2>
                                <?php } else { ?>
                                    <h2 class="price">$<?php echo number_format($price, 0, '', '.'); ?></h2>
                                <?php } ?>
                                <?php if ($since == yes) { ?>
                                    <p class="since">Desde</p>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </li>
            <?php $seconds++; endwhile;
            wp_reset_postdata(); ?>
            </ul>
        <?php endif; ?>
    <?php endwhile;
    endif; ?>
</section>
<?php require_once('productos.php'); ?>
<?php get_footer(); ?>






