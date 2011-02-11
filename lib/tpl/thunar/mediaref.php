<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="ltr">
<head>
  <title><?php echo hsc($lang['mediaselect'])?> [<?php echo hsc($conf['title'])?>]</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <?php tpl_metaheaders()?>
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL?>layout.css" />
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL?>design.css" />

</head>

<body id="mediaref">
	<div id="content">
		<div id="contentprepend"><div class="free1"></div></div>
		<div id="contentbody">
			<?php html_msgarea()?>
			<h1><?php echo hsc($lang['reference'])?> <code><?php echo hsc(noNS($DEL))?></code></h1>
			<p><?php echo hsc($lang['ref_inuse'])?></p>
			<?php tpl_showreferences($mediareferences)?>
		</div>
		<div id="contentappend"><div class="free1"></div></div>
	</div>
</body>
</html>

