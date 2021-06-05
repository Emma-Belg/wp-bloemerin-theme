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
	<div class="wrapper" id="page-wrapper">
	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">
		<div class="row">
			<div class="col-lg-8">
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

								displayPostPreview(200, get_the_title())
								?>
							</div>
						</div>
					</div>

					<?php
					if (have_posts()) {
						get_template_part('loop-templates/content', 'signup');
					}
					?>

				</div>
			</div>

			<!-- My own area for the right sidebar-->
			<div class="custom-right-sidebar offset-lg-1 col-lg-3">
				<br/>
				<br/>
				<?php
				$post = get_post();
				get_template_part('loop-templates/content', 'about');
				?>
				<div class="home-we-accept">
					<div class="container">
						<div class="row">
							<?php displayCategoryIcons() ?>
						</div>
					</div>
				</div>
				<?php
				get_template_part('loop-templates/content', 'inspiration');
				?>
			</div>
		</div>
	</div>

<?php
get_footer();
