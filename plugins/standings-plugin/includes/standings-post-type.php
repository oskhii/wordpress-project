<?php
/* Register the new post type: standings */
function standingsplugin_register_post_type() {

    $labels = array(
        'name' => 'Standings',
        'singular_name' => 'Standings',
        'add_new' => 'Add standings',
        'add_new_item' => 'Add new standings',
        'edit_item' => 'Edit standings',
        'new_item' => 'New standings',
        'view_item' => 'View standings',
        'search_items' => 'Search standings',
        'not_found' => 'Could not find standings',
        'not_found_in_trash' => 'Could not find standings in recycle bin'
    ); 

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'custom-fields'
        ),
        'rewrite' => array('slug' => 'standings'),
        'show_in_rest' => true
    );

    register_post_type('standings_product', $args);
}

add_action('init', 'standingsplugin_register_post_type');

/* Register new taxonomy: standings category*/
function standingsplugin_register_taxonomy() {
    $labels = array(
        'name' => 'Standings categories',
        'singular_name' => 'Standings category',
        'search_items' => 'Search standings categories',
        'all_items' => 'All standings categories',
        'edit_item' => 'Edit standings category',
        'update_item' => 'Update standings category',
        'add_new_item'=> 'Add standings category',
        'new_item_name' => 'New standings category name',
        'menu_name' => 'Standings categories'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'sort' => true,
        'args' => array('orderby' => 'term_order'),
        'rewrite' => array('slug' => 'standings'),
        'show_admin_column' => true,
        'show_in_rest' => true
    );

    register_taxonomy('standings_category', array('standings_product'), $args);
}

add_action('init', 'standingsplugin_register_taxonomy');

?>