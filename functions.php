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

function echoString( $string){
	echo $string;
}

function debugPrint($input){
	var_dump($input);
	echo '<script>console.log(' . json_encode($input,JSON_HEX_TAG) . ')</script>';
}

function displayPostPreview($postNumber, $category = null)
{
	$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => $category,
			'posts_per_page' => $postNumber,
			'cat' => -1
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
							<?php
							$tags =  get_the_tags();
							foreach($tags as $tag){ ?>
								<div class="btn tag">
									<?php
									echoString('<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>')?>
								</div>
							<?php } ?>
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

			<div class="equalHeightWrapContainer">
				<div class="equalHeightWrapContent">
					<?php
						$current_url =  home_url($_SERVER['REQUEST_URI']);
						echoString('<h4>
						<a href="' . $current_url.'/'.$category->slug . '">' . $category->name . '</a></h4>');
					?>
				</div>
				<div class="equalHeightWrapContent">
					<?php
				if ($arr_posts->have_posts()) :
					while ($arr_posts->have_posts()) :
						$arr_posts->the_post();
						if (has_post_thumbnail()) :
							echoString('<div class="thumbnail-image"><a href="' . $current_url.'/'.$category->slug . '">' . get_the_post_thumbnail() . '</a></div>');
						?>
						<br />
				</div>
			</div>
					<?php
						endif;
						endwhile;
					endif;
					}
	}
}

function displayCarouselItem($tagName, $postIndex)
{
	$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category__not_in' => 1,
			'tag_slug__in' => $tagName
	);
	$arr_posts = new WP_Query();
	$post_query = $arr_posts->query($args);
	if ($arr_posts->have_posts()) :
		while ($arr_posts->have_posts()) :
			$arr_posts->the_post();
	$tags = get_the_tags();
	foreach ($tags as $tag) {
		if ($tag->name == $tagName) {
						?>
				<a href="<?php echo get_permalink($post_query[$postIndex]->ID);?>">
					<div >
					<?php
					echo get_the_post_thumbnail($post_query[$postIndex]->ID, '', $post_query[$postIndex]->post_title)
					?>
					</div>
					<div class="carousel-caption d-md-block">
						<h4><?php echo $post_query[$postIndex]->post_title;?></h4>
					</div>
				</a>
			<?php
		}
	}
		endwhile;
	endif;
}

function displayCategoryImageAndName($category)
{
	$args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'category_name' => $category,
			'posts_per_page' => 1,
	);
	$post = new WP_Query($args);
	$categoryLink =  get_category_link(get_cat_ID($category));
	//the_category($category);
	$find="category";
	$replace="recipes";
	$modifiedToRecipeLink=str_replace($find,$replace,$categoryLink);
	?>
	<a href="<?php echo $modifiedToRecipeLink ?>" class="button">
		<div class="absolute-holder">
			<?php
			if ($post->have_posts()) {
				while ($post->have_posts()) {
					$post->the_post();
					if (has_post_thumbnail()) :
						the_post_thumbnail();
					endif;
					echoString('<div class="title">' . $category . '</div>');
				}
			}
			?>
		</div>
	</a>
<?php
}

function createWidget($id_base, $widgetName, $widgetDomain, $description, $widgetTitle) {

}
class wpb_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
// Base ID of your widget
				'wpb_widget',
// Widget name will appear in UI
				__('WPBeginner Widget', 'wpb_widget_domain'),
// Widget description
				array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), )
		);
	}

// Creating widget front-end
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
		echo __(displayCategoryIcons(), 'wpb_widget_domain' );
		echo $args['after_widget'];
	}

// Widget Backend
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
// Class wpb_widget ends here
}


// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
