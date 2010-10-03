<?php
/**
 * DokuWiki Xfce Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.png" />
</head>

<body>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div id="xfce-header" class="hidden">
    <h1>Xfce Wiki</h1>
  </div>

  <div id="xfce-menu-top">
    <div id="xfce-menu-top-left"><a href="http://wiki.xfce.org/" title="Xfce Wiki"><img title="" alt="logo" src="<?php echo DOKU_TPL?>images/logo.png" /></a></div><div id="xfce-menu-top-right"></div>

    <div id="xfce-menu-links">
      <ul>
        <li><form class="button" method="post" action="/"><div class="no"><input type="submit" value="Wiki" class="button" accesskey="h" title="Xfce Wiki" /></div></form></li>
        <li><?php tpl_button('edit')?></li>
        <li><?php tpl_button('history')?></li>
        <li><?php tpl_button('recent')?></li>
        <li><?php tpl_button('index')?></li>
        <li><?php tpl_searchform()?></li>
      </ul>
    </div>

    <div id="xfce-menu-translation">
      <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>
    </div>

    <?php if($conf['breadcrumbs']){?>
    <div id="xfce-menu-breadcrumbs">
      <span id="xfce-breadcrumbs-yourarehere"><?php tpl_youarehere() ?></span>
      <span id="xfce-breadcrumbs-trace"><?php tpl_breadcrumbs()?></span>
    </div>
    <?php }?>

    <?php flush()?>

  </div>

  <hr class="hidden" />

  <div id="xfce-content-wrap">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>

  <?php flush()?>

  <div id="xfce-footer" class="clear">
    <div class="bar-left" id="bar__bottomleft">
      <?php tpl_pageinfo()?>
    </div>
    <div class="bar-right" id="bar__bottomright">
      <?php tpl_userinfo()?>
      <?php tpl_button('subscription')?>
      <?php tpl_button('admin')?>
      <?php tpl_button('profile')?>
      <?php tpl_button('login')?>
      <?php tpl_button('top')?>
    </div>
    <div class="clear"></div>
    <?php tpl_license(false)?>
    <div class="copy">&copy; Xfce 2006-2010</div>
  </div>

</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
