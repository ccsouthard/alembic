<?php 
global $query_string; //We now have access to the original WordPress Query
$exclude = s_build_cat_exclude(); //Build the list of categories to exclude
if($exclude)
	$exclude = '&cat=' . $exclude;
$posts = query_posts($query_string . $exclude); //Tell WordPress to exclude some categories, if required.
if(have_posts()) : while(have_posts()) : the_post();
?>
	<section class="entry group">
		<p class="post-date">
			<span class="day"><?php the_time('d'); ?></span>
			<br>
			<span class="month"><?php the_time('F'); ?></span>
		</p>
		<h1 class="post-title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h1>
		<?php the_content(); ?>
	</section>
<?php
endwhile;
else: //If no posts are present
?>
	<section class="entry group">
		<p><?php _e('No posts were found.', 's'); ?></p>
	</section>
<?php endif;?>

<?php include("wrapper.php"); ?>

			