<?php /* Template Name: Portfolio */ ?>
<?php 
	wp_enqueue_script('isotope', S_THEME_DIR.'/assets/js/jquery.isotope.min.js');
?>
<section>
	<?php if(!get_the_title()==''){echo '<h1>'.get_the_title().'</h1>';}?>
	<?php
		$portfolio_category = get_terms('portfolio_cat');
		if($portfolio_category):
	?>
	<ul id="options" class="option-set unstyled-h" data-option-key="filter">
		<li>
			<a data-option-value="*" class="selected">Show all</a>
		</li>
		<?php foreach($portfolio_category as $portfolio_cat): ?>
			<li>
				<a data-option-value=".<?php echo $portfolio_cat->slug; ?>">
					<?php echo $portfolio_cat->name; ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
	<?php
	endif;
	if(have_posts()){
		while(have_posts()){
			the_post();
			the_content();
		} 
	}
	?>
</section>
<script>
	jQuery(function() {
		var container = jQuery('.gallery');
		container.isotope({
			itemSelector: '.element'
		});
		var optionSets = jQuery('#options'),
			optionLinks = optionSets.find('a');

		optionLinks.click(function() {
			var jQuerythis = jQuery(this);
			// don't proceed if already selected
			if (jQuerythis.hasClass('selected')) {
				return false;
			}
			var optionSet = jQuerythis.parents('.option-set');
			optionSet.find('.selected').removeClass('selected');
			jQuerythis.addClass('selected');

			// make option object dynamically, i.e. { filter: '.my-filter-class' }
			var options = {},
			key = optionSet.attr('data-option-key'),
				value = jQuerythis.attr('data-option-value');
			// parse 'false' as false boolean
			value = value === 'false' ? false : value;
			options[key] = value;
			if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
				// changes in layout modes need extra logic
				changeLayoutMode(jQuerythis, options)
			} else {
				// otherwise, apply new options
				container.isotope(options);
			}

			return false;
		});
	});
</script>

<?php include("wrapper.php"); ?>
