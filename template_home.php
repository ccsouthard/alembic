<?php /* Template Name: Home */ ?>
<section>
	<?php
	if(have_posts()){
		while(have_posts()){
			the_post();
			the_content();
		}
	}
	?>
</section>

<?php include("wrapper.php"); ?>
