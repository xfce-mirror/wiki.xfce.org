<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="header" class="main_width"><div class="pad group">
	<?php tpl_includeFile('header.html') ?>

	<?php if($conf['breadcrumbs'] || $conf['youarehere']): ?>
		<div class="breadcrumbs">
			<?php if($conf['youarehere']): ?>
				<div class="youarehere"><?php tpl_youarehere() ?></div>
			<?php endif ?>
			<?php if($conf['breadcrumbs']): ?>
				<div class="trace"><?php tpl_breadcrumbs() ?></div>
			<?php endif ?>
		</div>
	<?php endif ?>

	<div class="tools">
		<div class="mobileTools">
			<?php tpl_actiondropdown($lang['tools']); ?>
		</div>
		<?php $translation = &plugin_load('helper','translation'); ?>
		<?php if ($translation != NULL) : ?>
			<div class="translation">
				<?php echo $translation->showTranslations(); ?>
			</div>
		<?php endif ?>
	</div>

	<hr class="a11y" />
</div></div><!-- /header -->
