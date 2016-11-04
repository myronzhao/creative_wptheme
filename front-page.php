<?php get_header();  ?>

<?php $heroImage = get_field('hero_image'); ?>

<section class="hero" style="background-image:url(<?php echo $heroImage['url'] ?>)">
  <div class="wrapper">
    <h1><?php the_field('head_line'); ?></h1>
    <h3><?php the_field('tag_line'); ?></h3>
  </div>
</section>

<div class="main">
  <div class="container">

    <div class="content">
      
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
        <section class="services">
          <div class="wrapper">
            <h2><?php the_field('service_title') ?></h2>
            
            <div class="serviceContent">
              <?php while(have_rows('service_content')) : the_row(); ?>
                <div class="contentItem">
                  <?php $serviceImage = get_sub_field('image') ?>
                  <img src="<?php echo $serviceImage['url'] ?>" alt="<?php echo $serviceImage['alt'] ?>">
                  <h4><?php the_sub_field('heading'); ?></h4>
                  <p><?php the_sub_field('content'); ?></p>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </section>

        <section class="quote">
          <div class="wrapper">
            <h3><?php the_field('quote_line'); ?></h3>
          </div>
        </section>
      
        <section class="blog-section">
          <div class="wrapper">
            <h2> <?php the_field('latest_posts_title'); ?> </h2>
            <ul>
               <?php    
                  $args = array( 'numberposts' => 3, 'post_status'=>"publish",'post_type'=> "post",'orderby'=>"date",'order' => 'DSC');
                  $postslist = get_posts( $args );
                  foreach ($postslist as $post) :  setup_postdata($post); ?> 
                      <li class="home-blog">
                           <div>
                              <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                                  <img src="<?php echo $image[0]; ?>">
                              <?php endif; ?> 
                           </div> 
                           <div>
                              <a href="<?php the_permalink(); ?>" title="<?php the_title();?>"><h2><?php the_title(); ?></h2> </a>
                              <h4><?php echo get_the_date(); ?></h4>
                              <h4><?php the_author(); ?></h4>
                              <p><?php the_excerpt(); ?></p>
                           </div>    
                      </li>
              <?php endforeach; ?>
            </ul>

            <?php wp_reset_postdata(); ?>
          </div>
        </section>

        <?php the_content(); ?>
      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>