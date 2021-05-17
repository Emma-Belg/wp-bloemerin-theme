<?php
/**
 * Template Name: Recipe Category
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
			<div class="home-products">
				<div class="container">
					<h1><?php echo get_the_title() ?></h1>

					<?php
					while (have_posts()) {
						the_post();
						get_template_part('loop-templates/content', 'page');
					}

					displayPostPreview (get_the_title(), 200)
					?>
				</div>
			</div>
		</div>

		<?php
		if ( have_posts() ) {
			get_template_part( 'loop-templates/content', 'signup' );
		}
		?>

		<div class="home-we-accept">
			<div class="container">
				<div class="row">
					<?php displayCategoryIcons() ?>
				</div>
			</div>
		</div>
	</div>

	<div class="container-info">
		<div class="info-holder">
			<?php
				get_template_part( 'loop-templates/content', 'inspiration' );
			?>
		</div>
	</div>

<?php
get_footer();
