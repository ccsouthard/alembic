<!-- this needs refactoring -->

<div id="sidebar">
	<?php
		if(function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar')) : 
		endif;
	?>
</div>