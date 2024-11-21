<?php get_header(); ?>

<div class="pgp-single-image">
    <h1><?php the_title(); ?></h1>
    <div class="pgp-image">
        <?php the_post_thumbnail( 'full' ); ?>
    </div>
    <div class="pgp-description">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>