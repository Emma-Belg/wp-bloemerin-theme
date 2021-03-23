<?php
/**
 * Template Name: Contact Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

<!--					--><?php
//					while ( have_posts() ) {
//						the_post();
//						get_template_part( 'loop-templates/content', 'page' );
//						get_template_part( 'loop-templates/content', 'contact' );
//						// If comments are open or we have at least one comment, load up the comment template.
//						if ( comments_open() || get_comments_number() ) {
//							comments_template();
//						}
//					}
//					?>
					<div class="contact-container">
						<div class="footer-contact-info">
							<div class="row">
								<div class="col-lg-4">
									<?php
									get_template_part( 'loop-templates/content', 'page' );
									?>
<!--									<div class="title">Want to get in contact?</div>-->
<!--									<div class="description">-->
<!--										<p>If you would like to get in contact with Erin, please fill out this contact form.</p>-->
<!--									</div>-->
<!--									<div class="contact-info">-->
<!--										<i class="fa fa-phone"></i>-->
<!--										<i class="fa fa-envelope-o"></i>-->
<!--										phone and email...probs wont actually have this??-->
<!--									</div>-->
								</div>
								<div class="col-lg-8">
									<div class="contact-form-holder">
										<?php echo do_shortcode('[contact-form-7 id="17" title="Contact Form"]') ?>
									</div>
								</div>
							</div>
						</div>
					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();
