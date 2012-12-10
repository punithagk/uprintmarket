<div class="comment-section">
<?php print render($content['comments']); ?>
	<div class="box">
	<?php print render($content['comment_form']); ?>
	</div>
</div>
<?php //print '<pre>'. check_plain(print_r($node, 1)) .'</pre>' ?>
