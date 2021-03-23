<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
		'/theme-settings.php',                  // Initialize theme default settings.
		'/setup.php',                           // Theme setup and custom theme supports.
		'/widgets.php',                         // Register widget area.
		'/enqueue.php',                         // Enqueue scripts and styles.
		'/template-tags.php',                   // Custom template tags for this theme.
		'/pagination.php',                      // Custom pagination for this theme.
		'/hooks.php',                           // Custom hooks.
		'/extras.php',                          // Custom functions that act independently of the theme templates.
		'/customizer.php',                      // Customizer additions.
		'/custom-comments.php',                 // Custom Comments file.
		'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
		'/editor.php',                          // Load Editor functions.
		'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ($understrap_includes as $file) {
	require_once $understrap_inc_dir . $file;
}

function theme_enqueue_styles()
{
	//get the theme data
	$the_theme = wp_get_theme();

	wp_enqueue_style('child-understrap-styles',
			get_stylesheet_directory_uri() . '/css/child-theme.min.css',
			array(), $the_theme->get('Version'));
	wp_enqueue_script('jquery');

	wp_enqueue_script('child-understrap-scripts',
			get_stylesheet_directory_uri() . '/js/child-theme.min.js',
			array(), $the_theme->get('Version'), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}

function displayPostPreview($category, $postNumber)
{
	$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => $category,
			'posts_per_page' => $postNumber,
	);
	$arr_posts = new WP_Query($args);

	if ($arr_posts->have_posts()) :

		while ($arr_posts->have_posts()) :
			$arr_posts->the_post();
			?>

			<div class="home-product">
				<div class="row">
					<div class="col-lg-5">
						<a href="<?php the_permalink(); ?>"
						   class="btn">
							<?php
							if (has_post_thumbnail()) :
								the_post_thumbnail();
							endif;
							?>
						</a>
					</div>
					<div class="col-lg-7">
						<div class="title"><?php the_title(); ?></div>
						<div class="content"><?php the_excerpt(); ?>
						</div>
						<div class="tags">
							Tags:
							<br>
							<?php the_tags(' ', ',  '); ?>
							<div class="btn tag"><?php the_tags(null, ', ', ''); ?></div>

							<?php
							//$tags[] = the_tags();
							//echo $tags;
							//foreach ($tags as $key => $value):
							?>
							<!--								<div class="btn tag">--><?//= $value;
							?><!--</div>-->
							<!--							--><?php //endforeach;
							?>
						</div>
					</div>
				</div>
			</div>
		<?php
		endwhile;
	endif;
}

function displayCategoryIcons()
{
	$categories = get_categories();
	foreach ($categories as $category) {
		if ($category->name !== "Uncategorized") {
			$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'category_name' => $category->name,
					'posts_per_page' => 1,
			);
			$arr_posts = new WP_Query($args);
			?>

			<div class="col-lg-4 col-sm-6">
			<?php
			echo '<h1>
<a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></h1>';

			if ($arr_posts->have_posts()) :
				while ($arr_posts->have_posts()) :
					$arr_posts->the_post();
					if (has_post_thumbnail()) :
						the_post_thumbnail();
					?>
						</div>

							<?php
						endif;
						endwhile;
					endif;
					}
	}
}

