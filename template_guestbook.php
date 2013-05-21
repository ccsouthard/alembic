<?php /* Template Name: GuestBook */ ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="entry group">
		<?php if(!get_the_title()==''){echo '<h1>'.get_the_title().'</h1>';}?>
		<?php the_content(); ?>
		<?php comments_template(); ?>
	</section>
<?php endwhile; ?>
<?php else: //If no posts are present ?>
	<section class="entry group">
		<p><?php _e('No posts were found.', 's'); ?></p>
	</section>
<?php endif; ?>


<?php include("wrapper.php"); ?>
