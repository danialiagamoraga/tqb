<?php
// Register Custom Post Type
function tqb_servicios()
{
    $labels = array(
        'name' => 'Servicios Te Quiero Bonita',
        'singular_name' => 'Servicios',
        'menu_name' => 'Servicios',
        'name_admin_bar' => 'Mis servicios',
        'archives' => 'Item Archives',
        'parent_item_colon' => 'Parent Item:',
        'all_items' => 'Lista de servicios',
        'add_new_item' => 'Añadir nuevo proyecto',
        'add_new' => 'Nuevo servicio',
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
        'label' => 'Servicios',
        'description' => 'Servicios',
        'labels' => $labels,
        'supports' => array('title', 'excerpt', 'thumbnail'),
        'taxonomies' => array('servicios'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-index-card',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('servicios-tqb', $args);

}

add_action('init', 'tqb_servicios', 0);
// Register Custom Taxonomy
function categoria_de_servicio()
{

    $labels = array(
        'name' => 'Especialidad',
        'singular_name' => 'Categorias',
        'menu_name' => 'Área del servicio',
        'all_items' => 'Mis Categorias',
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
        'orderby' => 'name',
        'hierarchical'               => true,
        'query_var'                  => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'rewrite' => array('slug' => 'servicios'),

    );
    register_taxonomy('servicios', 'servicios-tqb', $args);
}

add_action('init', 'categoria_de_servicio', 0);

add_filter('rwmb_meta_boxes', 'services_prefix');
function services_prefix($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Descripción servicios y/o productos', 'textdomain'),
        'post_types' => 'servicios-tqb',
        'fields' => array(
            array(
                'id' => 'description',
                'name' => __('Descripción', 'textdomain'),
                'type' => 'textarea',
            ),
            array(
                'id'      => 'since',
                'name'    => __( 'Desde', 'textdomain' ),
                'type'    => 'radio',
                'options' => array(
                    'yes' => __( 'Sí', 'textdomain' ),
                    'no' => __( 'No', 'textdomain' ),
                ),
            ),
            array(
                'id' => 'price',
                'name' => __('Precio normal', 'textdomain'),
                'type' => 'number',
            ),
            array(
                'id' => 'discount',
                'name' => __('Oferta', 'textdomain'),
                'type' => 'number',
            ),

        ),
    );
    return $meta_boxes;
}
