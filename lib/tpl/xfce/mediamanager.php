<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
/**
 * Xfce Wiki Template
 *
 * This template is based on top of the default DokuWiki template.
 *
 * @author Mike Massonnet <andi@splitbrain.org>
 */
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo strip_tags($conf['title'])?> - <?php echo hsc($lang['mediaselect'])?></title>
  <?php tpl_metaheaders()?>
  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.png" />
</head>

<body>

<div class="msgarea"><?php html_msgarea()?></div>

<div id="media__manager" class="dokuwiki">
    <div id="media__left">
        <h1><?php echo hsc($lang['mediaselect'])?></h1>

        <?php /* keep the id! additional elements are inserted via JS here */?>
        <div id="media__opts"></div>

        <?php tpl_mediaTree() ?>
    </div>

    <div id="media__right">
        <?php tpl_mediaContent() ?>
    </div>
</div>
</body>
</html>
