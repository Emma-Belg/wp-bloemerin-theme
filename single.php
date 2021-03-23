<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

get_header();
$container = get_theme_mod('understrap_container_type');
?>

	<div class="post-header-holder">
		<div class="container">
			<header class="entry-header">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
			</header>
			<!-- .entry-header -->
		</div>
	</div>
	<div class="post-header-metadata">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<i class="fa fa-calendar"></i> Post Date:
					<?php echo get_the_date('d.m.Y'); ?>
				</div>
				<div class="col-lg-5">
					<i class="fa fa-bars"></i> Post Category:
					<?php echo get_the_category()[0]->cat_name; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper" id="single-wrapper">

		<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

			<div class="row">

				<div class="col-lg-8">
					<main class="site-main" id="main">

						<?php
						while (have_posts()) {
							the_post();
							get_template_part('loop-templates/content', 'single');
							?>
							<div class="post-navigation-options">
								<?php understrap_post_nav(); ?>
							</div>
							<div class="post-comment-section">
								<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if (comments_open() || get_comments_number()) {
								comments_template();
							}	?>
							</div>
							<?php
						}
						?>

					</main>
				</div><!-- #main -->

				<!-- My own area for the right sidebar-->
				<div class="offset-lg-1 col-lg-3">
					<div class="right-sidebar-blog-categories">
						<h3>Categories</h3>
						<?php echo get_the_category_list() ?>
					</div>
				</div>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #single-wrapper -->

<?php
get_footer();
