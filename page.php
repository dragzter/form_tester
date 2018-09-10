<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package form_tester
 */

get_header();

do_page_header_section();

do_cta_section();
do_services_section();
do_portfolio_section();


?>
<section id="page-body">
	<div class="container">
		<div class="row">
			<div class="col-8">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
			</div>
			<div class="col-4">
				<?php get_sidebar(); ?>
			</div>
			
		</div>
	</div>
</section>
		
<?php
do_cta_2_section();
do_contact_section();

get_footer();