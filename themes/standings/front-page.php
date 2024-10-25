<?php

get_header(); ?>

<div id="front-page-content">
    <main>
        <div id="front-page-content-box">
<?php
$the_query = new WP_Query(array(
    'category_name' => 'standings',
    'orderby' => 'date',
    'order' => 'desc',
    'posts_per_page' => '8'
));

if ($the_query->have_posts()) :

    while($the_query->have_posts()) : $the_query->the_post(); ?>
    <div class="box-content">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
    </div>
    <?php
    endwhile;
    wp_reset_postdata();
else: ?>
    <p>No posts.</p>
<?php
endif;  ?> 
        </div> <!-- front-page-content-box -->
    </main>
</div> <!-- front-page-content -->
<?php
get_footer();
?>
