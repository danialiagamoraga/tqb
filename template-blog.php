<?php
/*
Template Name: Blog
*/
get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

    <section id="blog-template" class="contenedor">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <h1 class="titulo"><?php the_title(); ?></h1>
                <h3 class="subtitulo"><?php if (has_excerpt()) {
                        echo the_excerpt();
                    } else {
                        echo wp_trim_words(get_the_content(), 80, '...');
                    }; ?>
                </h3>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php
        $index = 1;
        $seconds = 1;
        query_posts('post_type=post&post_status=publish&posts_per_page=8'); ?>
        <?php if (have_posts()): ?>

        <div id="thumb" class="thumb-content">
            <?php while (have_posts()): the_post(); ?>
                <article id="post-<?php the_ID() ?>" class="tqb-<?php echo $index ?> wow fadeInLeft"
                         data-wow-delay="<?php echo $seconds ?>ms">
                    <figure>
                        <?php the_post_thumbnail(); ?>
                        <a href="<?php the_permalink(); ?>" class="link-blog">
                            <div class="bg-hover"></div>
                            <div class="content-blog">
                                <h2><?php the_tags('#TQB: '); ?></h2>
                                <h1><?php the_title(); ?></h1>
                            </div>
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