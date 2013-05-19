<?php /* Template Name: Single Portfolio */ ?>
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
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/gallery.css">

<?php include("wrapper.php"); ?>
