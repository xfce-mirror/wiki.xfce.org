<?php
	
	include_once(dirname(__FILE__).'/lang/en/lang.php');
	@include_once(dirname(__FILE__).'/lang/'.$conf['lang'].'/lang.php');
	
	include(dirname(__FILE__).'/explorer.php');
	include(dirname(__FILE__).'/toc.php');
	$toc = getToc();
	
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>" lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
	<title><?php tpl_pagetitle()?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php tpl_metaheaders(); ?>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL; ?>layout.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL; ?>design.css" />
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL; ?>plugins.css" />
	<?php if($lang['direction'] == 'rtl') { ?>
	<link rel="stylesheet" media="screen" type="text/css" href="<?php echo DOKU_TPL; ?>rtl.css" />
	<?php } ?>
	<link rel="stylesheet" media="print" type="text/css" href="<?php echo DOKU_TPL; ?>print.css" />
</head>
<body>
	<!-- ========================== HEADER ========================== -->
	<div id="header">
		<div id="headerprepend"></div>
		<div id="logo"><a href="<?php echo wl($conf["start"]); ?>"><img src="<?php echo DOKU_TPL; ?>images/logo.jpg"/></a></div>
		<div id="userinfo"><?php tpl_userinfo(); ?></div>
		<div id="searchform">
			<?php tpl_searchform(); ?>
		</div>
		<div id="navigation">
			<ul>
				<li><?php tpl_actionlink("login"); ?></li>
				<li><?php tpl_actionlink("recent"); ?></li>
				<li><?php tpl_actionlink("admin"); ?></li>
			</ul>
		</div>
		<div id="headerappend"></div>
	</div>
	<!-- ========================== TOC ========================== -->
	<?php if($toc){ ?>
	<div class="menu pagemap">
		<div class="menuprepend"><strong class="menutitle"><?php echo $lang["pagemap"]; ?></strong><div class="free1"></div></div>
		<div class="menubody">
			<?php echo $toc; ?>
		</div>
		<div class="menuappend"><div class="free1"></div></div>
	</div>
	<?php } ?>
	<!-- ========================== EXPLORER ========================== -->
	<div class="menu explorer">
		<div class="menuprepend"><strong class="menutitle"><?php echo $lang["sitemap"]; ?></strong><div class="free1"></div></div>
		<div class="menubody">
			<?php tpl_explorer()?>
		</div>
		<div class="menuappend"><div class="free1"></div></div>
	</div>
	<!-- ========================== LINKS ========================== -->
	<div id="links">
		<ul>
			<li><a href="<?php echo DOKU_BASE; ?>feed.php" title="<?php echo $lang['btn_recent']; ?>"><img src="<?php echo DOKU_TPL; ?>images/button-rss.png" alt="<?php echo $lang['btn_recent']; ?>" /></a></li>
			<li><a href="http://thunar.xfce.org/" title="Thunar"><img src="<?php echo DOKU_TPL; ?>images/button-thunar.png" alt="Thunar" /></a></li>
			<li><a href="http://wiki.splitbrain.org/wiki:dokuwiki" title="DokuWiki"><img src="<?php echo DOKU_TPL; ?>images/button-dw.png" alt="DokuWiki" /></a></li>
		</ul>
	</div>
	<!-- ========================== CONTENT ========================== -->
	<div id="content">
		<div id="contentprepend">
			<ul class="commands">
				<li>[<?php tpl_actionlink("edit"); ?>]</li>
				<li>[<?php tpl_actionlink("history"); ?>]</li>
			</ul>
			<div class="free1"></div>
		</div>
		<div id="contentbody">
			<?php html_msgarea(); ?>
			<?php flush(); ?>
			<?php tpl_content(); ?>
			<div class="clearer">&nbsp;</div>
			<?php flush(); ?>
			<div class="pageinfo">
				<?php tpl_pageinfo(); ?>
			</div>
		</div>
		<div id="contentappend"><div class="free1"></div></div>
	</div>
	<!-- ============================== FOOTER ============================= -->
	<?php tpl_indexerWebBug(); ?>
</body>
</html>
