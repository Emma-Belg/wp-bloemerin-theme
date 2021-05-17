<?php
/**
 * Template Name: Recipes Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
	get_template_part('global-templates/hero');
}
?>
	<!--TODO: Change all divs to be semantic-->

	<div class="home-product-info">
		<div class="home-products-holder">
			<div class="container">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>

			<div class="home-we-accept">
				<div class="container">
					<div class="row">
						<?php
						displayCategoryIcons();
						//TODO: You need to delete the below template - not needed
						//get_template_part( 'loop-templates/content', 'categories' );
						?>
					</div>
				</div>
			</div>

				<div class="home-products">
					<hr/>
					<h2>Recent Recipes</h2>
					<?php
					displayPostPreview ('Cakes & Cupcakes', 20)
					?>

				</div>
			</div>
		</div>

	<?php
		get_template_part( 'loop-templates/content', 'signup' );
	?>

	</div>

	<div class="container-info">
		<div class="info-holder">
			<?php
			if ( post_exists("International Inspiration!") ) {
				get_template_part( 'loop-templates/content', 'inspiration' );
			}
			?>
		</div>
	</div>

<?php
get_footer();
