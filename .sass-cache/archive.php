<?php
/*
Template Name: Archives
*/ get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="blog-template" class="contenedor">
    <?php if (have_posts()) : ?>
        <?php /* If this is a category archive */
        if (is_category()) { ?>
            <h1 class="titulo">Categoría: <?php single_cat_title(); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is a tag archive */
        } elseif (is_tag()) { ?>
            <h1 class="titulo">#Tags: <?php single_tag_title(); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is a daily archive */
        } elseif (is_day()) { ?>
            <h1 class="titulo"><?php the_time('F jS, Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is a monthly archive */
        } elseif (is_month()) { ?>
            <h1 class="titulo"><?php the_time('F, Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is a yearly archive */
        } elseif (is_year()) { ?>
            <h1 class="titulo"><?php the_time('Y'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is an author archive */
        } elseif (is_author()) { ?>
            <h1 class="titulo"><?php _e('Autor', 'admincore'); ?></h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
            <?php /* If this is a paged archive */
        } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            <h1 class="titulo">Blog TQB</h1>
            <h3 class="subtitulo">Peluquería Te Quiero Bonita</h3>
        <?php } ?>
    <?php endif; ?>


    <?php
    $index = 1;
    $seconds = 1;
    query_posts('post_type=post&post_status=publish&posts_per_page=8&paged=' . get_query_var('paged')); ?>
    <?php if (have_posts()): ?>
    <?php $post = $posts[0]; ?>

    <div id="thumb" class="thumb-content">
        <?php while (have_posts()): the_post(); ?>
            <article id="post-<?php the_ID() ?>" class="tqb-<?php echo $index ?> wow fadeInLeft"
                     data-wow-delay="<?php echo $seconds ?>ms">
                <figure>
                    <a href="<?php the_permalink(); ?>">
                        <!--<div class="blog-hover"><h3>Leer publicacion</h3></div> -->
                        <?php the_post_thumbnail() ?>
                        <figcaption>
                            <h2><?php the_tags('#TQB: '); ?></h2>
                            <h1><?php the_title() ?></h1>
                        </figcaption>
                    </a>
                </figure>
            </article>
            <?php $index++;
            $seconds *= 2.5;endwhile;
        endif; ?>
    </div>

</section>

<div class="navigation">
    <div class="contenedor contenedor-col">
        <div><?php previous_posts_link(); ?></div>
        <div class="blog-name"><a href="<?php echo esc_url(home_url('/')); ?>blog/">TQB BLOG</a></div>
        <div><?php next_posts_link(); ?></div>
    </div>
</div>


<?php require_once('sub-footer.php'); ?>
<?php get_footer(); ?>
