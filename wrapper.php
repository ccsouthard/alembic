<?php
//this file wraps all the standard stuff around the parts that are unique for
//each page. I'm not particularly fond of opening a bunch of tags in
//header.php and then closing them all in footer.php ... it just doesn't seem
//right to see them all open in a file, so using this wrapper lets all that
//default stuff be dealt with in one file without allowing tags to go
//unclosed.
$unique_content = ob_get_contents();
ob_clean();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<?php get_header(); ?>
	<body <?php body_class(); ?>>
		<header>
			<nav class="wrap" id="main-nav">
				<a href="<?php bloginfo('url'); ?>" id="logo">
					<img src="<?php echo stripslashes(get_option('s_logo', S_THEME_LOGO)); ?>" alt="<?php bloginfo('title'); ?>"/>
				</a>
				<?php s_menu(); ?>
				<ul class="social">
					<li>
						<a href="<?php echo stripslashes(get_option('s_social_link1')); ?>" id="social-1">&nbsp;</a>
					</li>
					<li>
						<a href="<?php echo stripslashes(get_option('s_social_link2')); ?>" id="social-2">&nbsp;</a>
					</li>
					<li>
						<a href="<?php echo stripslashes(get_option('s_social_link3')); ?>" id="social-3">&nbsp;</a>
					</li>
				</ul>
			</nav>
		</header>
		<div class="wrap">
			<?php echo $unique_content;?>
		</div>
		<?php get_footer(); ?>
		<?php
			if(get_option('s_footer_js_code')=="true")
				echo stripslashes(get_option('s_footer_js'));
		?>
	</body>
</html>

