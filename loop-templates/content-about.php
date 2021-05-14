<div class="right-sidebar-promotion">
	<?php
	if (post_exists("About Erin")) :
		echo get_the_post_thumbnail(103);
	 else :
	?>
	<img alt="Erin"
		 src="<?php echo get_template_directory_uri(); ?>/img/erin-square.jpeg"
	>
	<?php
	endif;
	?>
	<div class="entry-content">
		<div class="title"><?php
			if ( post_exists("About Erin") ) {
			echo get_the_title(103);
			} else {
			echo "About Erin";
			}
			?>
			</div>
		<div class="desc"><?php
			if ( post_exists("About Erin") ) {
				echo get_the_content(null, false, 103);
			} else {
				$current_url =  home_url($_SERVER['REQUEST_URI']);
				echo "Wondering how American Cakes ended up in Antwerp, Belgium? Well that’s an
			easy answer!I left California to study for my masters and in the meantime I fell in love
			with a Belgian . So now my baking is here to stay... but everyone who’s tried my cakes
			seems pretty happy about that.";
				echoString('<br /><button style="border: none"><a href="' . $current_url.'/about-erin' . '">About Erin</a></button>');
			}
			?>
		</div>
	</div>
</div>
