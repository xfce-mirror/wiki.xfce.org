<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>" lang="<?php echo $conf['lang']; ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title><?php echo hsc($lang['mediaselect'])?> [<?php echo hsc($conf['title'])?>]</title>
		<?php tpl_metaheaders(); ?>
		<link rel="shortcut icon" href="<?php echo DOKU_TPL?>favicon.ico" />
	</head>
<body id="media">
	<?php html_msgarea()?>
	<h1><?php echo hsc($lang['mediaselect'])?> <code><?php echo hsc($NS)?></code></h1>
	<div class="mediaselect">
		<div class="mediaselect-left">
			<strong><a href="<?php echo DOKU_BASE?>lib/exe/media.php?ns="><?php echo hsc($lang['namespaces'])?></a></strong>
			<?php tpl_medianamespaces()?>
		</div>
		<div class="mediaselect-right">
			<?php tpl_mediafilelist()?>
			<div class="uploadform">
				<?php tpl_mediauploadform()?>
			</div>
		</div>
	</div>
</body>
</html>

