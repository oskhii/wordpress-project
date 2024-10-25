<?php
function standingsplugin_shortcode($tpc_attr) {
    $default = array(
        'category' => 'all'
    );
    $cat = shortcode_atts($default, $tpc_attr);

    if($cat['category'] == 'all'):
        $args = array(
            'post_type' => 'standings_product',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'DESC'
        );
    else:
        $args = array(
            'post_type' => 'standings_product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'standings_category',
                    'field' => 'slug',
                    'terms' => $cat['category']
                )
            ),
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'DESC'
        );
    endif;

    $text = '<div class="standings">';
    $loop = new WP_Query($args);
    if ($loop->have_posts()):
        while($loop->have_posts()) : $loop->the_post();
            $text .= '<section class="standings-title"><h3>' . get_the_title() . '</h3>';
            $text .= '<p>' . get_the_content() . '</p></section>';
        endwhile;
    else:
        $text .= '<p>No standings found.</p>';
    endif;

    $text .= '</div>';

    wp_reset_postdata();

    return $text;
}

add_shortcode('standings-widget', 'standingsplugin_shortcode');

?>