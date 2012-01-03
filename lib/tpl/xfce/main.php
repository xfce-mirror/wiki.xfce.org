<?php
/**
 * Xfce Wiki Template
 *
 * This template is based on top of the default DokuWiki template.
 *
 * @author Mike Massonnet <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

/**
 * Reverse compatibility for DokuWiki < 2010-10-27
 */
function __tpl_flush(){
	if (function_exists('tpl_flush')){
		tpl_flush();
	} else {
		ob_flush();
		flush();
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo strip_tags($conf['title'])?> - <?php tpl_pagetitle()?></title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.png" />
</head>

<body>

<?php include "xfce-header.html" ?>

<div class="msgarea"><?php html_msgarea()?></div>

<div class="bottom-right-corner"></div>

<div class="dokuwiki">

  <div class="stylehead">

    <div class="header">

      <div class="hidden">
        <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" id="dokuwiki__top"')?>
      </div>

      <div class="bar" id="bar__top">
        <div class="bar-left" id="bar__topleft">
          <ul>
            <li><?php tpl_link(wl(), 'Wiki', 'class="action" accesskey="h" rel="nofollow" title="'.$conf['title'].'"')?></li>
            <li><?php tpl_actionlink('edit')?></li>
            <li><?php tpl_actionlink('history')?></li>
            <li><?php tpl_actionlink('recent')?></li>
            <li><?php tpl_actionlink('index')?></li>
          </ul>
        </div>
        <div class="bar-right" id="bar__topright">
          <?php tpl_searchform()?>
        </div>
      </div>

      <div class="clearer"></div>

      <?php $translation = &plugin_load('helper','translation'); ?>
      <?php if ($translation != NULL) { ?>
      <div class="translation">
        <?php echo $translation->showTranslations(); ?>
        <?php tpl_link(wl('wiki:translation'), '?', 'class="action" rel="nofollow" title="Wiki Translation"')?>
      </div>
      <?php } ?>

      <div class="breadcrumbs">
        <?php $conf['youarehere'] = true; tpl_youarehere() ?>
        <?php //tpl_youarehere() ?>
      </div>

    </div>

  </div>
  <?php __tpl_flush()?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>

  <div class="clearer">&nbsp;</div>

  <?php __tpl_flush()?>

  <div class="stylefoot">

    <div class="meta">
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
      <div class="user">
        <?php tpl_userinfo()?>&nbsp;
      </div>
    </div>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
        <?php tpl_actionlink('edit')?>
        <?php tpl_actionlink('history')?>
        <?php tpl_actionlink('revert')?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php tpl_actionlink('subscribe')?>
        <?php tpl_actionlink('admin')?>
        <?php tpl_actionlink('profile')?>
        <?php tpl_actionlink('login')?>
        <?php tpl_actionlink('top')?>
      </div>
      <div class="clearer"></div>
    </div>

    <?php tpl_license(false);?>

    <div class="credit">
      &copy; Xfce 2006-<?php echo date('Y'); ?>
    </div>

  </div>

</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
