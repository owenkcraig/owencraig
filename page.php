<?php get_header(); ?>

<div class="main">
  <div class="container">
    <div class="content">
      <?php // Start the loop ?>

      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        
        <section class="home" id="home" style="background-image: url(<?php echo hackeryou_get_thumbnail_url($post) ?> );" data-stellar-background-ratio="0.25" <?php body_class(); ?>>
          <div class="heroWrapper" data-stellar-ratio="0.75">
            <div class="heroWrapperContent">
              <h1><?php the_field('firstName'); ?> <span class="lastName"><?php the_field('lastName'); ?></span></h1>
              <h3><?php the_field('jobTitle'); ?></h3>
              <a href="#about"><i class="fa fa-chevron-down"></i></a>
            </div>
          </div>
        </section>

        <section class="nav" id="nav">
          <?php wp_nav_menu( array(
            'container' => false,
            'theme_location' => 'primary'
          )); ?>
          <i class="fa fa-bars"></i>
          <div class="showMobileNav">
            <?php wp_nav_menu( array(
              'container' => false,
              'theme_location' => 'primary'
            )); ?>
          </div>
        </section>

        <section class="about" id="about">
          <div class="wrapper">
            <h2>About Me</h2>
            <div class="aboutContent">
              <div class="aboutText">
                <p><?php the_field('aboutText'); ?></p>
                <div class="socialIcons">
                  <h3>Get in touch:</h3>
                  <div class="socialEntries">
                    <?php while( has_sub_field('socialGallery') ): ?>
                      <div class="socialEntry">
                        <a href=" <?php the_sub_field('social_url'); ?> " target="_blank">
                          <?php the_sub_field('socialImage'); ?>
                        </a> 
                      </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              </div>
              <div class="aboutImage">
                <img src="<?php the_field('aboutImage'); ?>" alt="">
                <p><?php the_field('aboutImageCredit') ?></p>
              </div>
            </div>
          </div>
        </section>

        <section class="skills" id="skills">
          <div class="wrapper">
            <h2>Skills</h2>
            <div class="skillsContent">
              <div class="skillsSummary">
                <p><?php the_field('skillsSummary'); ?></p>
              </div>
              <div class="skillsGallery">
                <?php while( has_sub_field('skillsGallery') ): ?>
                  <div class="skillsEntry">
                    <?php the_sub_field('skillLogo'); ?> 
                    <p><?php the_sub_field('skillDescription'); ?></p>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>
          </div>
        </section>

        <section class="divider" id="divider" style="background-image: url(<?php the_field('dividerImage'); ?>" data-stellar-background-ratio="0.25"></section>

        <section class="portfolio" id="portfolio">
          <div class="wrapper">
            <h2>Portfolio</h2>
            <?php
              $portfolioPieces = new WP_Query(
                array(
                        'posts_per_page' => -1,
                        'post_type' => 'portfolio',
                        'order' => 'ASC'
                        )
                ); ?>
                
            <?php if ( $portfolioPieces->have_posts() ); ?>
                <?php while ($portfolioPieces->have_posts()) : $portfolioPieces->the_post(); ?>
                  <?php $image = get_field('portfolioImage'); ?>
                  <div class="portfolioItem">
                    <div class="portfolioItemDetails">
                      <div class="portfolioImage" style="background-image: url(<?php echo $image['sizes']['large']; ?>">
                      </div>
                      <div class="portfolioDescription">
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_content(); ?></p>
                        <a href=" <?php the_field('portfolio_url') ?> " class="viewSite" target="_blank">View the Site</a>
                      </div>
                    </div>
                  </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
          </div>
        </section>

        <section class="contact" id="contact" style="background-image: url(<?php the_field('contactImage'); ?>" data-stellar-background-ratio="0.25">
          <div class="wrapper">
            <h2>Contact</h2>
            <?php echo do_shortcode('[contact-form-7 id="9" title="Contact form"]') ?>
          </div>
        </section>

      <?php endwhile; // end the loop?>
    </div> <!-- /,content -->
  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>