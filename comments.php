<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])){
		die ('Please do not load this page directly. Thanks!');
	}
	$comments_by_type = &separate_comments($comments); 

//the <section> tag is opened in template_guestbook.php

if(comments_open()):
?>
		<?php
		if(get_option('comment_registration') && !is_user_logged_in()):
			_e( 'Please login to comment.', 's' );
		?>
	</section>

	<?php
	else:
	?>

		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="guestbook-form">
			<span class="wpcf7-form-control-wrap">
				<input name="author" value="Name" onfocus="if(this.value==this.defaultValue){this.value=''}" onblur="if(this.value==''){this.value=this.defaultValue}" id="comment_name" />
			</span>
			<span class="wpcf7-form-control-wrap">
				<input name="email" value="Email" onfocus="if(this.value==this.defaultValue){this.value=''}" onblur="if(this.value==''){this.value=this.defaultValue}" id="comment_email" />
			</span>
			<span class="wpcf7-form-control-wrap textarea">
				<textarea name="comment" onfocus="if(this.value==this.defaultValue){this.value=''}" onblur="if(this.value==''){this.value=this.defaultValue}">Comment
				</textarea>
			</span>
			<input type="submit" class="button" name="submit" value="Share" />
			<small><?php cancel_comment_reply_link(); ?></small>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
		</form>
	</section>

<?php
		endif; // If registration required and not logged in
	endif; // if you delete this the sky will fall on your head
?>

<?php if(post_password_required()): ?>
	<p class="nopassword">
		<?php _e( 'This post is password protected. Enter the password to view any comments.', 's' ); ?>
	</p>
<?php return; endif; ?>


<?php if(have_comments()): ?>
	<?php 
	wp_list_comments('callback=s_comments');

	// Are there comments to navigate through?
	if (get_comment_pages_count() > 1 && get_option( 'page_comments')):
	?>
		<div class="navigation">
			<div class="nav-previous">
				<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 's' ) ); ?>
			</div>
			<div class="nav-next">
				<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 's' ) ); ?>
			</div>
		</div>
	<?php
	endif; // check for comment navigation
	?>

<?php else: // this is displayed if there are no comments so far ?>
	<?php
	if(comments_open()):
	?>
		<!-- If comments are open, but there are no comments. -->
	<?php
	else: // comments are closed
	?>
		<p class="nocomments">
			<?php _e( 'Comments are closed', 's' ); ?>
		</p>
	<?php
	endif;
	?>
<?php endif; ?>
