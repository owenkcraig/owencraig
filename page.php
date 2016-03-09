<?php get_header();  ?>

<div class="main">
  <div class="container">
    <div class="content">
      <?php // Start the loop ?>

      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div class="hero">
          <h1><?php the_field('name'); ?></h1>
          <h3><?php the_field('jobTitle'); ?></h3>
          <h3><?php the_field('tagline'); ?></h3>
        </div>

        <div class="about">
          <h1>About Me</h1>
          <img src="<?php the_field('aboutImage'); ?>" alt="">
          <p><?php the_field('aboutText'); ?></p>
        </div>

        <div class="skills">
          <?php while( has_sub_field('skillsGallery') ): ?>
            <div class="skillsEntry">
              <p><?php the_sub_field('skillsDescription'); ?></p>
            </div>
          <?php endwhile; ?>
        </div>





      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->

    <?php get_sidebar(); ?>

  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>