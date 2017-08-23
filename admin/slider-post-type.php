<?php
// Register Custom Post Type
function slider_inicio()
{

    $labels = array(
        'name' => 'Slider',
        'singular_name' => 'Slide',
        'menu_name' => 'Slider Inicio',
        'name_admin_bar' => 'Slider',
        'archives' => 'Item Archives',
        'parent_item_colon' => 'Parent Item:',
        'all_items' => 'Todos los items',
        'add_new_item' => 'Nuevo item',
        'add_new' => 'Añadir slider',
        'new_item' => 'Nuevo item',
        'edit_item' => 'Editar Item',
        'update_item' => 'Update Item',
        'view_item' => 'View Item',
        'search_items' => 'Search Item',
        'not_found' => 'Not found',
        'not_found_in_trash' => 'Not found in Trash',
        'featured_image' => 'Featured Image',
        'set_featured_image' => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image' => 'Use as featured image',
        'insert_into_item' => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list' => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list' => 'Filter items list',
    );
    $args = array(
        'label' => 'Slide',
        'description' => 'Slides que se usan en la página de inicio',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields', 'excerpt'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 4,
        'menu_icon' => 'dashicons-format-video',
        'show_in_admin_bar' => false,
        'show_in_nav_menus' => false,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => true,
        'publicly_queryable' => true,
        'rewrite' => false,
        'capability_type' => 'page',
    );
    register_post_type('slider_inicio', $args);
}

add_action('init', 'slider_inicio', 0);

add_filter('rwmb_meta_boxes', 'slider_prefix');
function slider_prefix($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Llamado a la acción y ruta'),
        'post_types' => 'slider_inicio',
        'fields' => array(
            array(
                'id' => 'texto_boton',
                'name' => __('Texto botón', 'textdomain'),
                'type' => 'text',
            ),
            array(
                'id' => 'url_publicacion',
                'name' => __('Link', 'textdomain'),
                'type' => 'url',
                'std' => esc_html__('https://www.ejemplo.cl', 'your-prefix'),
            ),
        ),
    );
    return $meta_boxes;
}