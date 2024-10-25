<?php

class Standings_Widget extends WP_Widget {
    public function __construct() {
        parent::__construct(
            'standings_widget', 
            'Standings Widget',
            array(
                'customize_selective_refresh' => true
            )
        );
    }

    public function form($instance) {
        $defaults = array(
            'title' => '',
            'category' => 'all'
        );

        extract(wp_parse_args( (array) $instance, $defaults)); ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">Title</label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
        </p>
    
        <p>
        <label for="<?php echo esc_attr($this->get_field_id('category')); ?>">Category</label>
        <select id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>" class="widefat">
        <?php
            $terms = get_terms(
                array(
                    'taxonomy' => 'standings_category',
                    'hide_empty' => false
                )
            );
            $options = array(
                'all' => 'All standings categories'
            );

            foreach($terms as $term) :
                $options[$term->slug] = $term->name;
            endforeach;

            foreach($options as $key => $name) :
                echo '<option value="' . esc_attr($key) . '"' . selected($category, $key, false) . '>' . $name . '</option>';
            endforeach;
        ?>
        </select>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = isset($new_instance['title']) ? wp_strip_all_tags($new_instance['title']) : '';
        $instance['category'] = isset($new_instance['category']) ? wp_strip_all_tags($new_instance['category']) : '';
        return $instance;
    }

    public function widget($args, $instance) {

        extract($args);

        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
        $category = isset($instance['category']) ? $instance['category'] : 'all';

        echo $before_widget;

        echo '<div class="wp-widget-standings">';

        if($title) :
            echo $before_title . $title . $after_title;
        endif;

        if($category == 'all'):
            $args = array(
                'post_type' => 'standings_product',
                'post_status' => 'publish',
                'orderby' => 'relevance',
                'posts_per_page' => '1'
            );
        else:
            $args = array(
                'post_type' => 'standings_product',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'standings_category',
                        'field' => 'slug',
                        'terms' => $category
                    )
                ),
                'post_status' => 'publish',
                'orderby' => 'relevance',
                'posts_per_page' => '1'
            );
        endif;

        $text = '';
        $loop = new WP_Query($args);
        if ($loop->have_posts()):
            while($loop->have_posts()) : $loop->the_post();
                $text .= '<section class="standings-title"><h3>' . get_the_title() . '</h3>';
                $text .= '<p>' . get_the_content() . '</p></section>';
            endwhile;
        else:
            $text .= '<p>No standings found.</p>';
        endif;

        echo $text;

        wp_reset_postdata();

        echo '</div>';

        echo $after_widget;
    }
}

function standings_register_widget() {
    register_widget('Standings_Widget');
}

add_action('widgets_init', 'standings_register_widget');

?>