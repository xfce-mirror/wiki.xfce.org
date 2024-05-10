<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** FOOTER ********** -->
<div class="bars">
	<div class="bar-left">
		<?php echo (new dokuwiki\Menu\Item\Edit())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Recent())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Index())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Media())->asHtmlButton();?>
	</div>
	<div class="bar-right">
		<?php echo (new dokuwiki\Menu\Item\Admin())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Profile())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Login())->asHtmlButton();?>
		<?php echo (new dokuwiki\Menu\Item\Top())->asHtmlButton();?>
	</div>
</div>

<hr class="a11y" />

<div class="pad">
	<?php tpl_license(''); // license text ?>

	<div class="credit">
		Copyright 2003-<?php echo date('Y'); ?> Xfce Development Team.
	</div>
	</div>

</div>

<?php tpl_includeFile('footer.html') ?>
