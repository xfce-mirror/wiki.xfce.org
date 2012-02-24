<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://dokuwiki.org/templates
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
  <link rel="shortcut icon" href="/favicon.ico" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>
  <?php tpl_metaheaders()?>
</head>

<body>
<div id="xfce-header">
<div>
  <h1>Xfce Desktop Enviroment</h1>
  <h4>Xfce subdomain navigation</h4>

    <ul>
      <li><a href="http://www.xfce.org" title="Go to the homepage">Home</a></li>
      <li><a href="http://docs.xfce.org" title="Official documentation" class="active">Docs</a></li>
      <li><a href="http://archive.xfce.org" title="Download location of tarballs">Archive</a></li>
      <li><a href="http://wiki.xfce.org" title="Community documentation">Wiki</a></li>
      <li><a href="http://forum.xfce.org" title="Community forums">Forum</a></li>
      <li><a href="https://bugzilla.xfce.org" title="Report and track bugs">Bugs</a></li>
      <li><a href="http://blog.xfce.org" title="Visit the blog">Blog</a></li>
      <li><a href="https://translations.xfce.org" title="Help translating the Xfce project">Translate</a></li>
      <li><a href="http://git.xfce.org" title="Project repositories">GIT</a></li>
    </ul>
  </div>
  <div  id="xfce-header-clear"></div>
</div>
<?php html_msgarea()?>

<div class="header">
  <div class="breadcrumbs">
    <?php tpl_youarehere() ?>
  </div>
  <div class="translation">
    <?php $translation = &plugin_load('helper','translation'); ?>
    <?php if ($translation != NULL) { ?>
      <?php echo str_replace ('plugin_translation', '', $translation->showTranslations()) ?>
    <?php } ?>
  </div>
  <div class="search">
   <?php tpl_searchform()?>
  </div>
  <div class="clearer"></div>
</div>

<div class="dokuwiki" id="dokuwiki">

  <?php tpl_flush()?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
    <div class="clearer"></div>
    <div class="doc">
      <?php tpl_pageinfo()?>
    </div>
  </div>

  <div class="clearer"></div>

  <div class="bar" id="bar__bottom">
    <div class="bar-left" id="bar__bottomleft">
      <?php tpl_button('edit')?>
      <?php tpl_button('history')?>
      <?php tpl_button('revert')?>
      <?php tpl_button('recent')?>
    </div>
    <div class="bar-right" id="bar__bottomright">
      <?php tpl_button('subscribe')?>
      <?php tpl_button('admin')?>
      <?php tpl_button('profile')?>
      <?php tpl_button('login')?>
      <?php tpl_button('index')?>
      <?php tpl_button('top')?>
    </div>
    <div class="clearer"></div>
  </div>

  <?php tpl_flush()?>
  <div class="userinfo"><?php tpl_userinfo()?></div>
  <?php tpl_license(false);?>
</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
