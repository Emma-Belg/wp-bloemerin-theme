<div class="home-product-info-background-underlay">
	<div class="container">
		<div class="home-special-offer">
			<div class="discount-circle">
				<div class="absolute-holder">
					<div class="save">
						<?php
						if ( have_posts() ) {
							echo get_the_post_thumbnail(111);
						}
						?>
					</div>
				</div>
			</div>
			<div class="entry-content">
				<div class="title">
					<?php
					if ( have_posts() ) {
						echo get_the_title(111);
					} else {
						echo "Sign up to get Bloemerin in your inbox";
					}
					?>
				</div>
				<div class="desc">
					<?php
					if ( have_posts() ) {
						echo get_the_content(null, false, 111);
						echo do_shortcode('[wpforms id="141"]');
					} else {
						echo "Get Erin’s delicious recipes and baking tips straight to your inbox!";
						echo do_shortcode('[wpforms id="141"]');
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
