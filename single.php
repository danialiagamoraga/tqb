<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="publicacion" class="contenedor">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="contenedor">
            <h1 class="titulo"><?php the_title(); ?></h1>
            <h2 class="subtitulo"><?php the_time('j \d\e F \d\e Y'); ?> | En <?php the_category(', ') ?> |
                <span>Por <span class=""><?php the_author(); ?></span></span></h2>
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
            } ?>
            <?php the_content(''); ?>

            <div class="tags">
                <?php the_tags('', ' '); ?>
            </div>

            <div id="author" class="contenedor-col">
                <figure><?php echo get_avatar($id, $size = '96', '', $alt = 'Te quiero bonita - avatar', ''); ?></figure>
                <article class="info-author">
                    <h2><?php the_author_meta('nickname'); ?></h2>
                    <p><?php the_author_meta('description'); ?></p>
                </article>
            </div>
        </article>

    <?php endwhile; else: ?>
        <p>Lo siento! No existen resultados para tu búsqueda.</p>
    <?php endif; ?>

    <?php comments_template(); ?>
</section>

<div class="navigation">
    <div class="contenedor contenedor-col">
        <div><?php previous_post_link(); ?></div>
        <div class="blog-name"><a href="<?php echo esc_url(home_url('/')); ?>blog/">TQB BLOG</a></div>
        <div><?php next_post_link(); ?></div>
    </div>
</div>

<?php get_footer(); ?>