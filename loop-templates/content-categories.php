<?php
function displayCategoryIconsx($classContainerName)
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

			<div class="<?php $classContainerName ?>">
				<div class="equalHeightWrapContent">
					<div class="circle">
						<a href="#" class="button">
							<div class="absolute-holder">
<!--								<img alt="category"-->
<!--									 src="--><?php //echo get_template_directory_uri(); ?><!--/img/recipes/heather-barnes-_TN1m5R1pFI-unsplash.jpg"-->
<!--									 width="100%"-->
<!--								>-->
								<div class="equalHeightWrapContent">
								<?php
								$current_url =  home_url($_SERVER['REQUEST_URI']);
							if ($arr_posts->have_posts()) {
								while ($arr_posts->have_posts()) {
									$arr_posts->the_post();
									if (has_post_thumbnail()) {
										echoString('<a href="' . $current_url.'/'.$category->slug . '">' . get_the_post_thumbnail() . '</a>');
									}
								}
							}
								?>
								</div>
								<div class="title equalHeightWrapContent">
									<?php
									echoString('
						<a href="' . $current_url.'/'.$category->slug . '">' . $category->name . '</a>');
									?>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>

			<?php
		}
	}
}
?>

<div class="home-we-accept">
	<div class="container">
		<div class="title-holder">
			<h2>Looking for Inspiration?</h2>
			<div class="button-holder">
				<a href="#" class="button"></a>
			</div>
		</div>
		<div class="row">
			<?php
			displayCategoryIconsx("col-lg-12 col-sm-6 equalHeightWrapContainer");
			?>
		</div>
	</div>
</div>
