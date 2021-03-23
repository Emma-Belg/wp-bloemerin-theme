<?php
/**
 * Template Name: Under Construction
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

//get_header();
//$container = get_theme_mod('understrap_container_type');

if (is_front_page()) {
	get_template_part('global-templates/hero');
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<!--	Link to Moneypenny font-->
	<link rel="stylesheet"	href="css/typeface-moneypenny.css">
	<!--	Other fonts-->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,800;1,400&display=swap"
		  rel="stylesheet">
	<!--	<link rel="preconnect" href="https://fonts.gstatic.com">-->
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body>
<div class="under-construction">
	<div class="construction-words">
		<?php
		while ( have_posts() ) {
			the_post();
			get_template_part( 'loop-templates/content', 'page' );
		}
		?>
	</div>

</div>

</body>


