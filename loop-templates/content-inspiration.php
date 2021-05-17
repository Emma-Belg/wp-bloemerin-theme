<div class="container-info">
	<div class="info-holder">
		<div class="title">
			<i class="fa fa-globe"></i><?php
			if ( have_posts() ) {
				echo get_the_title(96);
			} else {
				echo "International Inspiration";
			}
			?>
		</div>
		<div class="description">
			<?php
			if ( have_posts() ) {
				echo get_the_content(null, false, 96);
			} else {
				$current_url =  home_url($_SERVER['REQUEST_URI']);
				echo "Hi! I’m Erin and American expat and for the past 6 years I’ve been collecting baking inspiration from all over the globe to share with you!";
				echoString('<br /><button style="border: none"><a href="' . $current_url.'/inspiration' . '">Baking Abroad</a></button>');
			}
			?>
		</div>
	</div>
</div>
