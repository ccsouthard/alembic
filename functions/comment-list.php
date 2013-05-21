<?php
function s_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
?>
	<section class="entry group comment">
		<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation</em>
		<?php endif; ?>
		<?php echo get_comment_text(); ?>

		<p id="comment-<?php comment_ID(); ?>" class="user_info">
			<?php echo get_avatar($comment,$size='20'); ?>
			<?php comment_author_link()?>
			<?php printf(__('%1$s at %2$s', 's'), get_comment_date('F j, Y'), get_comment_time('g:i a')) ?>
		</p>
	</section>
<?php
}
?>
