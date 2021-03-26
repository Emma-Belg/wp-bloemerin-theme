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

					<div class="contact-container">
						<div class="footer-contact-info">
							<div class="row">
								<div class="col-lg-4">
									<?php
									get_template_part( 'loop-templates/content', 'page' );
									?>
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
