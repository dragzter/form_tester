<?php 
function do_cta_section() {
  
  $cta_post = get_theme_mod('cta_section_cta_post');

  $qry = new WP_Query( 
    array( 
      'post_type' => array( 'post', 'page' ), 
      'p'  => $cta_post )
    );
?>

    <section class="bg-primary cta-section" id="about"><?php 
      if( $qry->have_posts() ) {
        while( $qry->have_posts() ){
          $qry->the_post(); ?>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 col-sm-12 mx-auto text-center">
                   
                  <h2 class="section-heading text-white"><?php the_title(); ?></h2>
                  <hr class="light my-4">
                  <?php if( has_excerpt() ){ ?>                      
                  <?php  the_excerpt(); ?> 
                  <?php } else { ?>             
                    <p class="text-faded mb-4"> <?php the_content(); ?></p>                         
                  <?php } ?> 
                                  
                  <a class="btn btn-light btn-xl js-scroll-trigger mb-3" href="#services">Get Started!</a>
              
              </div>
              <div class="col-lg-4 col-sm-12 ">
                <?php if( has_post_thumbnail() ){ ?>        
                    <?php the_post_thumbnail(); ?>         
                <?php } ?>
              </div>
            </div>
          </div><?php
        }
        wp_reset_postdata();
      } ?> 
    </section>

<?php
}