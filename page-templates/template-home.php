<?php
/**
 * Template Name: Home Page
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
	<!--TODO: Change all divs to be semantic
	TODO: look for all href="#"
	TODO: rename all classes to makesense and change in _theme.scss-->

	<div class="home-hero-banner-top">
		<div class="home-carousel">
			<div id="my-carousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<?php displayCarouselItem("Cakes", 0); ?>
					</div>
					<div class="carousel-item">
						<?php displayCarouselItem("Cakes", 1); ?>
					</div>
					<div class="carousel-item">
						<?php displayCarouselItem("Cakes", 2); ?>
					</div>
				</div>
				<a class="carousel-control-prev" href="#my-carousel" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#my-carousel" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="quote-holder-home">
		<div class="bloemerin-quote">
			<p class="dutch">Het leven is beter met Bloemerin.</p>
		</div>
		<div class="bloemerin-quote">
			<p class="english">Life is better with flour in it.</p>
		</div>
		<div class="bloemerin-quote">
			<p class="english-flowers">Life is better with flowers in it.</p>
		</div>
	</div>
	<div class="container">
		<br />
		<?php
		while (have_posts()) {
			the_post();
			get_template_part('loop-templates/content', 'page');
		}
		?>
	</div>
	<div class="home-product-info">
		<div class="home-products-holder">
			<div class="container">
				<div class="home-products">
					<div class="home-product">
						<div class="container">
							<?php
							displayPostPreview(3)
							?>
						</div>
					</div>

				</div>
			</div>
		</div>

		<?php
		if (have_posts()) {
			get_template_part('loop-templates/content', 'signup');
		}
		?>

		<br />
		<div class="home-we-accept">
			<div class="container">
				<div class="title-holder">
					<b>Pick a Category</b>
				</div>
				<div class="row">
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<div class="absolute-holder">
								<img alt="category"
									 src="<?php echo get_template_directory_uri(); ?>/img/recipes/heather-barnes-_TN1m5R1pFI-unsplash.jpg"
									 width="100%"
								>
								<div class="title">
									Category Name
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<?php
							displayCategoryImageAndName("Frostings & Fillings");
							?>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<?php
							displayCategoryImageAndName("Bread");
							?>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<?php
							displayCategoryImageAndName("Cakes & Cupcakes");
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="home-product">
		<div class="container">
			<?php
			get_template_part('loop-templates/content', 'inspiration');
			?>
		</div>
	</div>

<?php
get_footer();
