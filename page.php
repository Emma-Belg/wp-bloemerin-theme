<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();

$container = get_theme_mod('understrap_container_type');

?>

	<div class="page-header-holder">
		<div class="container">
			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
			<!-- .entry-header -->
		</div>
	</div>

	<div class="wrapper" id="page-wrapper">

		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

			<div class="row">

				<!-- Do the left sidebar check -->
				<!--			--><?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>
				<!-- My own area for the main content-->
				<div class="col-lg-7">
					<main class="site-main" id="main">

						<?php
						while (have_posts()) {
							the_post();
							get_template_part('loop-templates/content', 'page');

							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) {
								comments_template();
							}
						}
						?>

					</main><!-- #main -->
				</div>

				<!-- My own area for the right sidebar-->
				<div class="offset-lg-1 col-lg-4">
					<div class="right-sidebar-promotion">
						<img alt="Erin"
							 src="<?php echo get_template_directory_uri(); ?>/img/Erin.jpeg"
						>
						<div class="absolute-holder">
						</div>
						<div class="entry-content">
							<div class="title">About Erin</div>
							<div class="desc">Wondering how American Cakes ended up in Antwerp, Belgium? Well that’s an
								easy answer!I left California to study for my masters and in the meantime I fell in love
								with a Belgian . So now my baking is here to stay... but everyone who’s tried my cakes
								seems pretty happy about that.
							</div>
							<a href="#" class="button"></a>
						</div>
					</div>
				</div>

				<!-- Do the right sidebar check -->
				<!--			--><?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #page-wrapper -->

<?php
get_footer();
