<?php
// Register Custom Post Type
function tqb_portafolio()
{

    $labels = array(
        'name' => 'Portafolio Te Quiero Bonita',
        'singular_name' => 'Portafolio',
        'menu_name' => 'Portafolio',
        'name_admin_bar' => 'Mis trabajos',
        'archives' => 'Item Archives',
        'parent_item_colon' => 'Parent Item:',
        'all_items' => 'Mis trabajos',
        'add_new_item' => 'Añadir nuevo proyecto',
        'add_new' => 'Nuevo proyecto',
        'new_item' => 'New Item',
        'edit_item' => 'Edit Item',
        'update_item' => 'Update Item',
        'view_item' => 'View Item',
        'search_items' => 'Search Item',
        'not_found' => 'No existen items creados',
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
        'label' => 'Proyectos',
        'description' => 'Portafolio de trabajo',
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('proyectos'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 23,
        'menu_icon' => 'dashicons-images-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('portafolio', $args);

}

add_action('init', 'tqb_portafolio', 0);
// Register Custom Taxonomy
function tipo_de_proyecto()
{

    $labels = array(
        'name' => 'Tendencias',
        'singular_name' => 'Tendencia',
        'menu_name' => 'Tendencias',
        'all_items' => 'All Items',
        'parent_item' => 'Parent Item',
        'parent_item_colon' => 'Parent Item:',
        'new_item_name' => 'New Item Name',
        'add_new_item' => 'Add New Item',
        'edit_item' => 'Edit Item',
        'update_item' => 'Update Item',
        'view_item' => 'View Item',
        'separate_items_with_commas' => 'Separate items with commas',
        'add_or_remove_items' => 'Add or remove items',
        'choose_from_most_used' => 'Choose from the most used',
        'popular_items' => 'Popular Items',
        'search_items' => 'Search Items',
        'not_found' => 'Not Found',
        'no_terms' => 'No items',
        'items_list' => 'Items list',
        'items_list_navigation' => 'Items list navigation',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => false,
        'rewrite' => array('slug' => 'proyectos'),
    );
    register_taxonomy('proyectos', 'portafolio', $args);

}

add_action('init', 'tipo_de_proyecto', 0);

add_filter('rwmb_meta_boxes', 'portfolio_prefix');
function portfolio_prefix($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Información proyecto', 'textdomain'),
        'post_types' => 'portafolio',
        'fields' => array(
            array(
                'id' => 'detail-proyect',
                'name' => __('servicio', 'textdomain'),
                'type' => 'text',
            ),
            array(
                'id' => 'año',
                'name' => __('Año', 'textdomain'),
                'type' => 'number',
            ),
            array(
                'id' => 'photographer',
                'name' => __('Fotografía', 'textdomain'),
                'type' => 'text',
            ),
            array(
                'id' => 'photographer-url',
                'name' => __('Portafolio fotográfico', 'textdomain'),
                'type' => 'url',
            ),
        ),
    );
    $meta_boxes[] = array(
        'title' => __('Ubicación', 'textdomain'),
        'post_types' => 'portafolio',
        'fields' => array(
            array(
                'id' => 'ver_en_inicio',
                'name' => __('Mostrar en inicio', 'textdomain'),
                'type' => 'radio',
                'options' => array(
                    'yes' => __('Sí', 'textdomain'),
                    'no' => __('No', 'textdomain'),
                ),
            ),
        ),
    );
    return $meta_boxes;
}