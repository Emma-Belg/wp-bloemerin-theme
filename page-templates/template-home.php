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
	<!--TODO: Change all divs to be semantic-->

	<div class="home-hero-banner-top">
		<div class="home-carousel">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
	<div class="quote-holder-home">
		<div class="bloemerin-quote">
			<p class="dutch">Leven is beter met Bloemerin.</p>
		</div>
		<div class="bloemerin-quote">
			<p class="english">Life is better with flour in it.</p>
		</div>
	</div>
	<div class="container">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'loop-templates/content', 'page' );
		}
		?>
	</div>
	<div class="home-product-info">
		<div class="home-products-holder">
			<div class="container">
				<h2>Recent Recipes</h2>
				<div class="home-products">
					<div class="home-product">
						<div class="container">
							<?php
							displayPostPreview (the_category(), 3)
							?>
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
									<?php
									displayCategoryImageAndName("Frostings & Fillings");
									?>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<?php
									displayCategoryImageAndName("Bread");
									?>
								</div>
							</a>

						</div>
					</div>
					<div class="col-lg-3 col-sm-6">
						<div class="circle">
							<a href="#" class="button">
								<div class="absolute-holder">
									<?php
									displayCategoryImageAndName("Cakes & Cupcakes");
									?>
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
