<?php /* Template Name: Full Width */ ?>
<section id="content" class="grid-container">
	<div class="clearfix inner">
		<div class="grid-100">
			<?php s_breadcrumbs(); ?>
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
				<div class="entry">
					<?php if(!get_the_title()==''){echo '<h2>'.get_the_title().'</h2>';}?>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<?php else: //If no posts are present ?>
				<div class="entry">
					<p><?php _e('No posts were found.', 's'); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php include("wrapper.php"); ?>
