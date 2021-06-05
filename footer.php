<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="footer-testimonial">
		<div class="container">
			<div class="testimonial">
				<div class="stars">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</div>
				<div class="quote">
					"We had our wedding and Erin baked the most beautiful and delicious wedding cake for our special day and I just couldn't have been happier."
				</div>
				<div class="author">Sally, Facebook Review</div>
			</div>
		</div>
	</div>

	<div class="copyright">
		<div class="quote-holder">
			<div class="bloemerin-quote">
				<p class="dutch">Leven is beter met Bloemerin.</p>
			</div>
			<div class="bloemerin-quote">
				<p class="english">Life is better with flour in it.</p>
			</div>
			<div class="bloemerin-quote">
				<p class="english-flowers">Life is better with flowers in it.</p>
			</div>
		</div>
		<div class="container">
			<p>Copyright &#169 Bloemerin 2021 	<span>|</span>	 <a href="#">Terms & Conditions</a> 		<span>|</span> Website by Emma Wishart</p>
		</div>
	</div>

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

