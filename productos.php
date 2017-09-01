<section id="productos">
    <div class="contenedor">
        <?php
        // WP_Query arguments
        $args_productos = array(
            'showposts' => 4,
            'post_type' => array('productos'),
            'nopaging' => false,
            'orderby' => rand,
            'order' => ASC,
        );
        // The Query
        $query_productos = new WP_Query($args_productos); ?>

        <div id="slider-productos">
            <ul class="thumb-productos">
                <?php if ($query_productos->have_posts()) : while ($query_productos->have_posts()) : $query_productos->the_post(); ?>
                    <li class="nuestros-productos tqb-<?php the_ID() ?>">
                        <?php $meta = get_post_meta($post->ID, "añadir_link", true);
                        if ($meta == '') { ?>
                            <a href="#" title="<?php the_title(); ?>">
                                <img src="<?php
                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'full');
                                echo $image_url[0]; ?>"
                                     alt="<?php the_title(); ?>"></a>
                        <?php } else { ?>

                            <a href="<?php echo $meta ?>" title="<?php the_title(); ?>" target="_blank">
                                <img src="<?php
                                $image_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_image_src($image_id, 'full');
                                echo $image_url[0]; ?>"
                                     alt="Nuestros Productos - <?php the_title(); ?>"></a>
                        <?php } ?>
                    </li>
                <?php endwhile;
                endif; ?>
            </ul>
        </div>
    </div>
</section>