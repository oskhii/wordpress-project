<?php 
$current_url = get_post_field( 'post_name', get_post() );

if ($current_url == ('ucl')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-ucl' ); ?>
</div>
<?php endif;

if ($current_url == ('uel')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-uel' ); ?>
</div>
<?php endif;

if ($current_url == ('uecl')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-uecl' ); ?>
</div>
<?php endif;

if ($current_url == ('premier-league')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-premier-league' ); ?>
</div>
<?php endif;

if ($current_url == ('la-liga')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-la-liga' ); ?>
</div>
<?php endif;

if ($current_url == ('serie-a')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-serie-a' ); ?>
</div>
<?php endif;

if ($current_url == ('bundesliga')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-bundesliga' ); ?>
</div>
<?php endif;

if ($current_url == ('ligue-1')) : ?>
  <div class="sidebar">
    <?php dynamic_sidebar( 'sidebar-ligue-1' ); ?>
</div>
<?php endif; ?>
