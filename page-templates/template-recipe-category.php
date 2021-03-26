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

		<div class="home-product-info-background-underlay">
			<div class="container">
				<div class="home-special-offer">
					<div class="discount-circle">
						<div class="absolute-holder">
							<div class="save">
								Want
								<div class="highlight-word">
									Erin's Baking in
								</div>
								your inbox?
							</div>
						</div>
					</div>
					<div class="entry-content">
						<div class="title">Sign up to the newsletter</div>
						<div class="desc">Get delicious baking recipes in your inbox once a month... More info maybe not
							sure...
							just filler text
						</div>
						<a href="#" class="button"></a>
					</div>
				</div>
			</div>
		</div>

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
			<div class="title">
				<i class="fa fa-globe"></i>Baking across the globe
			</div>
			<div class="description">
				Hi, I am Erin. I love baking and I have been collecting inspiration from across the four
				different continents have lived and baked in. I can't wait to share all that have I learnt
				with you.
				<br/>
				<a href="#" class="btn btn-secondary">Baking Abroad</a>
			</div>
		</div>
	</div>

<?php
get_footer();
