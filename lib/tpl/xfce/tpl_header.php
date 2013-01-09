<?php
/**
 * Template header, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** HEADER ********** -->
<div id="dokuwiki__header"><div class="pad group">

    <?php tpl_includeFile('header.html') ?>

    <div class="tools group">

        <div id="dokuwiki__sitetools">
            <h3 class="a11y"><?php echo $lang['site_tools']; ?></h3>

            <?php $translation = &plugin_load('helper','translation'); ?>
            <?php if ($translation != NULL) : ?>
            <div class="translation">
                <?php echo $translation->showTranslations(); ?>
            </div>
            <?php endif ?>
            <?php tpl_searchform(); ?>
            <div class="mobileTools">
                <?php tpl_actiondropdown($lang['tools']); ?>
            </div>

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

        </div>

    </div>

    <?php html_msgarea() ?>

    <hr class="a11y" />
</div></div><!-- /header -->
