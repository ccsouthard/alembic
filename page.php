<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
	<section class="entry group">
		<?php if(!get_the_title()==''){echo '<h2>'.get_the_title().'</h2>';}?>
		<?php the_content(); ?>
	</section>
<?php endwhile; ?>
<?php else: //If no posts are present ?>
	<section class="entry group">
		<p><?php _e('No posts were found.', 's'); ?></p>
	</section>
<?php endif; ?>

<?php include("wrapper.php"); ?>
