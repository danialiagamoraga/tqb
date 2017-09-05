<?php
// Register Custom Post Type
function tqb_staff()
{
    $labels = array(
        'name' => 'Staff TQB',
        'singular_name' => 'Staff',
        'menu_name' => 'Staff',
        'name_admin_bar' => 'Staff',
        'archives' => 'Item Archives',
        'parent_item_colon' => 'Parent Item:',
        'all_items' => 'Listado staff',
        'add_new_item' => 'Añadir integrante',
        'add_new' => 'Añadir integrante',
        'new_item' => 'New Item',
        'edit_item' => 'Editando ',
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
        'label' => 'Staff',
        'description' => 'Staff TQB',
        'labels' => $labels,
        'supports' => array('title'),
        'taxonomies' => array('staff'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-id-alt',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );
    register_post_type('tqb-staff', $args);
}

add_action('init', 'tqb_staff', 0);

add_filter('rwmb_meta_boxes', 'staff_prefix');
function staff_prefix($meta_boxes)
{
    $meta_boxes[] = array(
        'title' => __('Información Personal', 'textdomain'),
        'post_types' => 'tqb-staff',
        'fields' => array(
            array(
                'id' => 'nombre',
                'name' => __('Nombre', 'textdomain'),
                'type' => 'text',
            ),
            array(
                'id' => 'rol',
                'name' => __('Rol', 'textdomain'),
                'type' => 'text',
            ),
            array(
                'id' => 'bio',
                'name' => __('Breve biografía', 'textdomain'),
                'type' => 'textarea',
            ),
        ),
    );

    $meta_boxes[] = array(
        'title' => __('Redes Sociales', 'textdomain'),
        'post_types' => 'tqb-staff',
        'fields' => array(
            array(
                'id' => 'facebook',
                'name' => __('Facebook', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'twitter',
                'name' => __('Twitter', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'instagram',
                'name' => __('Instagram', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'pinterest',
                'name' => __('Pinterest', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'tumblr',
                'name' => __('Tumblr', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'linkedin',
                'name' => __('Linkedin', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'google+',
                'name' => __('Google+', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'flickr',
                'name' => __('flickr', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'vimeo',
                'name' => __('Vimeo', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'youtube',
                'name' => __('Youtube', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'snapchat',
                'name' => __('Snapchat', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'deviantart',
                'name' => __('deviantART', 'textdomain'),
                'type' => 'url',
            ),
            array(
                'id' => 'soundcloud',
                'name' => __('SoundCloud', 'textdomain'),
                'type' => 'url',
            ),

        ),
    );

    return $meta_boxes;
}