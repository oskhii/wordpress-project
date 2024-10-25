<?php
register_nav_menus([ 'primary' => 'Main Menu']);

function theme_assets() {
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_script('theme-script', get_template_directory_uri() . '/js/theme.js', array('jquery'), '1-0-0', true);
}
add_action('wp_enqueue_scripts', 'theme_assets');

//Register new sidebars
function add_widget_support() {
    register_sidebar( array(
        'name' => 'Sidebar-UCL',
        'id' => 'sidebar-ucl',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-UEL',
        'id' => 'sidebar-uel',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-UECL',
        'id' => 'sidebar-uecl',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-Premier-League',
        'id' => 'sidebar-premier-league',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-La-Liga',
        'id' => 'sidebar-la-liga',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-Serie-A',
        'id' => 'sidebar-serie-a',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-Bundesliga',
        'id' => 'sidebar-bundesliga',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
    register_sidebar( array(
        'name' => 'Sidebar-Ligue-1',
        'id' => 'sidebar-ligue-1',
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ) );
}
//Hook the widget and run the function
add_action('widgets_init', 'add_widget_support');

//Register a new navigation menu
function add_Main_Nav() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
//Hook to the init action hook, run our navigation menu function
add_action( 'init', 'add_Main_Nav' );

function excerpt_read_more() {
    global $post;
    return ' <a href="' . get_permalink($post->ID) . '">Read more &raquo;</a>';
}
add_filter('excerpt_more', 'excerpt_read_more');

function theme_setup() {
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'theme_setup');

?>