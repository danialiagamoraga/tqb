<?php
require_once(get_template_directory() . '/admin/portafolio-post-type.php');
require_once(get_template_directory() . '/admin/servicios-post-type.php');
require_once(get_template_directory() . '/admin/productos-post-type.php');
require_once(get_template_directory() . '/admin/slider-post-type.php');
/* Limitar caracteres */
/*----------------------------------------------------------------------*/

function get_excerpt($count)
{
    $permalink = get_permalink($post->ID);
    $excerpt = get_the_content();
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    //$excerpt = $excerpt.'... <a href="'.$permalink.'">leer mas</a>';
    return $excerpt;
}

add_action('init', 'excerpts_pages');
function excerpts_pages()
{
    add_post_type_support('page', 'excerpt');
}

/* Logo */
/*----------------------------------------------------------------------*/

function tqb_theme_header($wp_customize)
{

    $wp_customize->add_section('tqb_logo_header', array(
        'title' => __('Logo header', 'tqb'),
        'priority' => 30,
        'description' => 'Añade el Logotipo de tu página en el header',
    ));

    $wp_customize->add_setting('tqb_logo');

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'tqb_logo', array(
        'label' => __('Logo', 'tqb'),
        'section' => 'tqb_logo_header',
        'settings' => 'tqb_logo',
    )));


}

add_action('customize_register', 'tqb_theme_header');


function tqb_theme_footer($wp_customize_2)
{

    $wp_customize_2->add_section('tqb_logo_footer', array(
        'title' => __('Logo footer', 'tqb_footer'),
        'priority' => 30,
        'description' => 'Añade el Logotipo de tu página en el footer',
    ));

    $wp_customize_2->add_setting('tqb_logo_2');

    $wp_customize_2->add_control(new WP_Customize_Image_Control($wp_customize_2, 'tqb_logo_2', array(
        'label' => __('Logo', 'tqb_footer'),
        'section' => 'tqb_logo_footer',
        'settings' => 'tqb_logo_2',
    )));


}

add_action('customize_register', 'tqb_theme_pages');

/* Menu's */
/*----------------------------------------------------------------------*/

register_nav_menus(array("navegacion" => "Menú principal de Navegación"));
register_nav_menus(array("rrss" => "Redes Sociales"));
register_nav_menus(array("agenda" => "Menú Usuario"));
register_nav_menus(array("navegacion-secundaria" => "Menu secundario de navegación"));

/* Imagen destacada */
/*----------------------------------------------------------------------*/
add_theme_support('post-thumbnails');


/* Widget */
/*----------------------------------------------------------------------*/
add_action('widgets_init', 'site_left');

function site_left()
{
    register_sidebar(
        array(
            'id' => 'tqb_left',
            'name' => __('Copyright', 'Te Quiero Bonita'),
            'description' => __('Añade navegación secundaria.'),
            'before_widget' => '<div class="footer-div">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'site_right');

function site_right()
{
    register_sidebar(
        array(
            'id' => 'tqb_rigth',
            'name' => __('Redes Sociales / Random', 'Te Quiero Bonita'),
            'description' => __('Añade tus redes sociales.'),
            'before_widget' => '<div class="footer-div">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}


add_action('widgets_init', 'site_sidebar_blog');

function site_sidebar_blog()
{
    register_sidebar(
        array(
            'id' => 'tqb_sidebar',
            'name' => __('Blog', 'Te Quiero Bonita'),
            'description' => __('Añade item relacionados a tu blog.'),
            'before_widget' => '<div class="sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
        )
    );
}

add_action('widgets_init', 'site_subfooter_about');

function site_subfooter_about()
{
    register_sidebar(
        array(
            'id' => 'tqb_about',
            'name' => __('Sub footer', 'Te Quiero Bonita'),
            'description' => __('Añade 4 columnas de contenido.'),
            'before_widget' => '<article class="sub-foot">',
            'after_widget' => '</article>',
            'before_title' => '<h1>',
            'after_title' => '</h1>'
        )
    );
}

/* Add class active */
/*----------------------------------------------------------------------*/
add_filter('nav_menu_css_class', 'special_nav_class', 10, 2);
function special_nav_class($classes, $item)
{
    if (in_array('current-menu-item', $classes)) {
        $classes[] = 'active ';
    }
    return $classes;
}

/* Scripts */
/*----------------------------------------------------------------------*/
function tequierobonita_assets()
{
    //wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array( 'style' ) );
    //wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css' );

    if (is_front_page()) {
        wp_enqueue_style('bxslider-style', get_stylesheet_directory_uri() . '/css/jquery.bxslider.min.css', array(), '4.7', true);
        wp_enqueue_script('bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.7', true);
        //wp_enqueue_script( 'theme-scripts', get_stylesheet_directory_uri() . '/js/jquery.bxslider.js', array( 'owl-carousel', 'jquery' ), '1.0', true );
    }
    wp_enqueue_script('assets', get_stylesheet_directory_uri() . '/js/assets.js', array('jquery'), '1.0', true);
    wp_enqueue_script('wow', get_stylesheet_directory_uri() . '/js/wow.js', array('jquery'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'tequierobonita_assets');


/* Formato form comentario */
/*----------------------------------------------------------------------*/


add_filter('comment_form_defaults', 'alter_comments_defaults');

function my_comment_form_before()
{
    ob_start();
}

add_action('comment_form_before', 'my_comment_form_before');

function my_comment_form_after()
{
    $html = ob_get_clean();
    $html = preg_replace(
        '/<h3 id="reply-title"(.*)>(.*)<\/h3>/',
        '<h1 id="reply-title" class="titulo-comentarios" \1>\2</h1>',
        $html
    );
    echo $html;
}

add_action('comment_form_after', 'my_comment_form_after');

/* Formato Comentarios */
/*----------------------------------------------------------------------*/

function tqb_comentarios($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <section <?php comment_class(); ?> id="li-comentario-<?php comment_ID() ?>">
        <article id="comentario-<?php comment_ID(); ?>" class="border">
            <div class="contenido-comentario contenedor-col">
                <figure class="gravatar">
                    <?php echo get_avatar($comment, $size = '48', $default = '<path_to_url>'); ?>
                </figure>

                <article class="comentario-meta">
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php _e('Your comment is awaiting moderation.') ?></em>
                        <br/>
                    <?php endif; ?>

                    <?php printf(__('<h2 class="nombre-autor">%s</h2>'), get_comment_author_link()) ?><?php edit_comment_link(__('Edit'), '  ', '') ?>
                    <a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"
                       class="fecha"><?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()) ?></a>
                    <div class="respuesta">
                        <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                    </div>

                    <?php comment_text() ?>
                </article>
            </div>
        </article>
    </section>
<?php }

/* Exclude search taxonomy */
/*----------------------------------------------------------------------*/

function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

add_filter('pre_get_posts','SearchFilter');