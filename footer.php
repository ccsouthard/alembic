<footer>
	<div class="wrap">
		<div id="sign_guestbook">
			<p>Sign Our Guestbook</p>
			<span class="wpcf7-form-control-wrap" style="padding-left:0">
				<input id='guestbook-name' type="text" value="Your Name"/>
			</span>
			<span class="wpcf7-form-control-wrap">
				<input id='guestbook-email' type="text" value="Email Address"/>
			</span>
			<span class="wpcf7-form-control-wrap">
				<button id="continue-to-guestbook">Continue...</button>
			</span>
		</div>
		<p id="back-top">
			<a href="#top">
				<span></span>
			</a>
		</p>
		<p class="copy">
			<?php
				echo '&copy;' . date('Y') . ' - <a href="http://ccsdesignhouse.com">CCS</a>';
			?>
		</p>
	</div>
	<?php wp_footer(); ?>
</footer>
