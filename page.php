<?php get_header();  ?>

<?php $heroImage = get_field('hero_image'); ?>

<section class="hero" style="background-image:url(<?php echo $heroImage['url'] ?>)">
  <div class="wrapper">
    <h1><?php the_field('head_line'); ?></h1>
  </div>
</section>

<div class="main">
  <div class="container">

    <div class="content">
      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>