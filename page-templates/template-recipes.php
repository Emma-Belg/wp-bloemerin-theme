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
				<h1><?php echo get_the_title() ?></h1>
			</ br>
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'page' );
				}
				?>

				<div class="row">

					<?php displayCategoryIcons() ?>

				</div>

				<div class="home-products">
					<?php
					displayPostPreview ('Cakes & Cupcakes', 20)
					?>

					<div class="home-product">
						<div class="row">
							<div class="col-lg-5">
								<img src="<?php echo get_template_directory_uri(); ?>/img/recipes/david-holifield-kPxsqUGneXQ-unsplash.jpg"
									 alt="cake"
									 width="100%"
								>
							</div>
							<div class="col-lg-7">
								<div class="title">Super Chocolate Cake</div>
								<div class="content">This will be the first part of the blog that will be copied over in
									here as an introduction to the recipe. More filler text will go until at some point
									it gets cut off with an ellipsis ...
								</div>
								<div class="tags">
									<div class="btn tag">Tag Name</div>
									<div class="btn tag">Another Tag Name</div>
									<div class="btn tag">A Third Tag</div>
									<div class="btn tag">Another Tag Name</div>
									<div class="btn tag">Another Tag Name</div>
								</div>
								<div class="btn absolute-holder-button">
									See recipe
								</div>
							</div>
						</div>
					</div>
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
				<div class="title-holder">
					<h2>Looking for Inspiration?</h2>
					<div class="button-holder">
						<a href="#" class="button"></a>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<img alt="category"
										 src="<?php echo get_template_directory_uri(); ?>/img/recipes/heather-barnes-_TN1m5R1pFI-unsplash.jpg"
										 width="100%"
									>
									<div class="title">
										Category Name
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<img alt="category"
										 src="<?php echo get_template_directory_uri(); ?>/img/recipes/diana-akhmetianova-OYKZNEwdZus-unsplash.jpg"
										 width="100%"
									>
									<div class="title">
										Category Name
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<img alt="category"
										 src="<?php echo get_template_directory_uri(); ?>/img/recipes/michaela-baum-VnM6_liIRJ0-unsplash.jpg"
										 width="100%"
									>
									<div class="title">
										Category Name
									</div>
								</div>
							</a>

						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<img alt="category"
										 src="<?php echo get_template_directory_uri(); ?>/img/recipes/american-heritage-chocolate-vdx5hPQhXFk-unsplash.jpg"
										 width="100%"
									>
									<div class="title">
										Category Name
									</div>
								</div>
							</a>
						</div>
					</div>

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
