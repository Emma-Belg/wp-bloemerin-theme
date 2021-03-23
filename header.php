<?php
/**
 * The header for our theme
 * Displays all of the <head> section and everything up till <div id="content">
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$container = get_theme_mod('understrap_container_type');
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

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action('wp_body_open'); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<div class="top-header">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-5 col-md-7">
						<div class="mobile-holder-logo">
							<a href="/">
								<img src="<?php echo get_template_directory_uri(); ?>/img/logos/Bloemerin_Logo2.png"
									 alt="Bloemerin Logo">
							</a>
						</div>
					</div>
					<div class="col-lg-7 col-md-5">
						<div class="top-header-contact">
							<div class="mobile-menu-dropdown-small">
								<button class="navbar-toggler"
										type="button"
										data-toggle="collapse"
										data-target="#navbarNavDropdown"
										aria-controls="navbarNavDropdown"
										aria-expanded="false"
										aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>"
								>
									<span>Menu</span> <i class="fa fa-bars"></i>
								</button>
							</div>
							<div class="top-header-social-icons">
								<a href="#"><i class="fa fa-facebook-square"></i></a>
								<a href="#"><i class="fa fa-instagram"></i></a>
								<a href="#"><i class="fa fa-pinterest-square"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav id="main-nav" class="navbar navbar-expand-lg navbar-dark" aria-labelledby="main-nav-label">

			<div class="container">

				<div class="search-input-holder">
					<div class="title"><i class="fa fa-search"></i></div>
					<input type="text" placeholder="Search recipes">
				</div>

				<div class="mobile-menu-dropdown">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'understrap'); ?>">
						<span>Menu</span> <i class="fa fa-bars"></i>
					</button>
				</div>

				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
						array(
								'theme_location' => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id' => 'navbarNavDropdown',
								'menu_class' => 'navbar-nav ml-auto',
								'fallback_cb' => '',
								'menu_id' => 'main-menu',
								'depth' => 2,
								'walker' => new Understrap_WP_Bootstrap_Navwalker(),
						)
				);
				?>
			</div><!-- .container -->

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
