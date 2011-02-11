<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="ltr">
<head>
  <title>
     <?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?>
    [<?php echo hsc($conf['title'])?>]
  </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_BASE?>lib/images/favicon.ico" />
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL?>layout.css" />
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL?>design.css" />

</head>

<body id="detail">
	<div id="content">
		<div id="contentprepend"><div class="free1"></div></div>
		<div id="contentbody">
			<?php html_msgarea()?>
			<?php if($ERROR){ print $ERROR; }else{ ?>

			<h1><?php echo hsc(tpl_img_getTag('IPTC.Headline',$IMG))?></h1>

			<div class="img_big">
				<?php tpl_img(900,700) ?>
			</div>

		<div class="img_detail">
		  <p class="img_caption">
			  <?php print nl2br(hsc(tpl_img_getTag(array('IPTC.Caption',
                                               'EXIF.UserComment',
                                               'EXIF.TIFFImageDescription',
                                               'EXIF.TIFFUserComment')))); ?>
	  	</p>

      <p>&larr; <?php echo $lang['img_backto']?> <?php tpl_pagelink($ID)?></p>

      <dl class="img_tags">
        <?php
					$t = tpl_img_getTag('Date.EarliestTime');
          if($t) print '<dt>'.$lang['img_date'].':</dt><dd>'.date($conf['dformat'],$t).'</dd>';

          $t = tpl_img_getTag('File.Name');
          if($t) print '<dt>'.$lang['img_fname'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag(array('Iptc.Byline','Exif.TIFFArtist','Exif.Artist','Iptc.Credit'));
          if($t) print '<dt>'.$lang['img_artist'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag(array('Iptc.CopyrightNotice','Exif.TIFFCopyright','Exif.Copyright'));
          if($t) print '<dt>'.$lang['img_copyr'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag('File.Format');
          if($t) print '<dt>'.$lang['img_format'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag('File.NiceSize');
          if($t) print '<dt>'.$lang['img_fsize'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag('Simple.Camera');
          if($t) print '<dt>'.$lang['img_camera'].':</dt><dd>'.hsc($t).'</dd>';

          $t = tpl_img_getTag(array('IPTC.Keywords','IPTC.Category'));
          if($t) print '<dt>'.$lang['img_keywords'].':</dt><dd>'.hsc($t).'</dd>';

        ?>
      </dl>
      <?php //Comment in for Debug// dbg(tpl_img_getTag('Simple.Raw'));?>
		</div>

  <?php } ?>
		</div>
		<div id="contentappend"><div class="free1"></div></div>
	</div>
</body>
</html>

