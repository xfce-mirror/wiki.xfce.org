<?php
	include_once(dirname(__FILE__).'/lang/en/lang.php');
	@include_once(dirname(__FILE__).'/lang/'.$conf['lang'].'/lang.php');
	
	include(dirname(__FILE__).'/sidebar.php');
	$toc = getToc();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']; ?>" lang="<?php echo $conf['lang']; ?>">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title><?php tpl_pagetitle()?> [<?php echo hsc($conf['title'])?>]</title>
		<?php tpl_metaheaders(); ?>
		<link rel="shortcut icon" href="<?php echo DOKU_TPL?>favicon.ico" />

	</head>
	<body>
<!-- =============================== HEADER =============================== -->
		<div id="header">
			<div id="headerprepend"></div>
			<div id="logo"><a href="<?php echo wl($conf["start"]); ?>"><img src="<?php echo DOKU_TPL; ?>images/logo.jpg"/></a></div>
			<div id="userinfo"><?php tpl_userinfo(); ?></div>
			<div id="searchform">
				<?php tpl_searchform(); ?>
			</div>
			<div id="navigation">
				<ul>
					<li><?php tpl_actionlink("login"); ?>&nbsp;</li>
					<li><?php tpl_actionlink("recent"); ?>&nbsp;</li>
					<li><?php tpl_actionlink("admin"); ?>&nbsp;</li>
				</ul>
			</div>
			<div id="headerappend"></div>
		</div>
		<div id="sidebar">
<!-- ================================= TOC ================================= -->
			<?php if($toc){ ?>
			<div class="menu pagemap">
				<div class="menutop">
					<div class="prepend"></div>
					<div class="title"><?php echo $lang["pagemap"]; ?></div>
				</div>
				<div class="menubody">
					<?php echo $toc; ?>
				</div>
				<div class="menubottom"><div class="prepend"></div></div>
			</div>
			<?php } ?>
<!-- ============================== EXPLORER =============================== -->
			<div class="menu">
				<div class="menutop">
					<div class="prepend"></div>
					<div class="title"><?php echo $lang["sitemap"]; ?></div>
				</div>
				<div class="menubody">
					<?php tpl_sitemap(); ?>
				</div>
				<div class="menubottom"><div class="prepend"></div></div>
			</div>
<!-- ================================ LINKS ================================ -->
			<div id="links">
				<ul>
					<li><a href="<?php echo DOKU_BASE; ?>feed.php" title="<?php echo $lang['btn_recent']; ?>"><img src="<?php echo DOKU_TPL; ?>images/button-rss.png" alt="<?php echo $lang['btn_recent']; ?>" /></a></li>
					<li><a href="http://thunar.xfce.org" title="Source"><img src="http://thunar.xfce.org/pwiki/lib/tpl/thunar/images/button-thunar.png" alt="Thunar" /></a></li>
					<li><a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="Propulsé par DokuWiki"><img src="<?php echo DOKU_TPL; ?>images/button-dw.png" alt="Propulsé par DokuWiki" /></a></li>
				</ul>
			</div>
		</div>
<!-- =============================== CONTENT =============================== -->
		<div id="content">
			<div id="contenttop">
				<div class="prepend"></div>
				<ul class="commands">
					<li>[<?php tpl_actionlink("edit"); ?>]</li>
					<li>[<?php tpl_actionlink("history"); ?>]</li>
				</ul>
			</div>
			<div id="contentbody">
				<?php html_msgarea(); ?>
				<?php flush(); ?>
				<?php tpl_content(); ?>
				<div class="clearer">&nbsp;</div>
				<?php flush(); ?>
			</div>
			<div id="contentbottom">
				<div class="prepend"></div>
				<?php tpl_pageinfo(); ?>
			</div>
		</div>
	</body>
</html>
