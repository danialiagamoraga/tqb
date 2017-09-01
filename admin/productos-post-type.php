<?php
// Register Custom Post Type
function tqb_productos() {

    $labels = array(
        'name'                  => 'Productos Te Quiero Bonita',
        'singular_name'         => 'Productos',
        'menu_name'             => 'Productos',
        'name_admin_bar'        => 'Mis Productos',
        'archives'              => 'Item Archives',
        'parent_item_colon'     => 'Parent Item:',
        'all_items'             => 'Lista de Productos',
        'add_new_item'          => 'Añadir nuevo Producto',
        'add_new'               => 'Nuevo Producto',
        'new_item'              => 'New Item',
        'edit_item'             => 'Edit Item',
        'update_item'           => 'Update Item',
        'view_item'             => 'View Item',
        'search_items'          => 'Search Item',
        'not_found'             => 'No existen items creados',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_item'      => 'Insert into item',
        'uploaded_to_this_item' => 'Uploaded to this item',
        'items_list'            => 'Items list',
        'items_list_navigation' => 'Items list navigation',
        'filter_items_list'     => 'Filter items list',
    );
    $args = array(
        'label'                 => 'Servicios',
        'description'           => 'Servicios',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail'),
        'taxonomies'            => array( 'proyecto' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 24,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'productos', $args );

}
add_action( 'init', 'tqb_productos', 0 );




