<?php

get_header(); ?>

<div id="category-content">
    <main>
        <div id="category-content-box">
<?php
$the_query = new WP_Query(array(
    'category_name' => 'europe',
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => '3'
));

if ($the_query->have_posts()) :

    while($the_query->have_posts()) : $the_query->the_post(); ?>
    <div class="box-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_content(); ?>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
else: ?>
    <p>No posts.</p>
<?php
endif;  ?> 
        </div> <!-- category-content-box -->
    </main>
</div> <!-- category-content -->
<?php
get_footer();
?>
