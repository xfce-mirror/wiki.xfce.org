<?php
/**
 * DokuWiki Default Template 2012
 *
 * @link     http://dokuwiki.org/template
 * @author   Anika Henke <anika@selfthinker.org>
 * @author   Clarence Lee <clarencedglee@gmail.com>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */

$hasSidebar = page_findnearest($conf['sidebar']);
$showSidebar = $hasSidebar && ($ACT=='show');
?><!DOCTYPE html>
<html lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title']) ?>]</title>
    <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>
    <?php tpl_metaheaders() ?>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <?php echo tpl_favicon(array('favicon', 'mobile')) ?>
    <?php tpl_includeFile('meta.html') ?>
	<link rel="stylesheet" media="screen" href="//cdn.xfce.org/style/css.php?site=wiki" type="text/css" />
</head>

<body>

<?php
    tpl_includeFile('xfce-header.html');
?>
    <!--[if lte IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

	<?php include('tpl_header.php') ?>

	<div id="dokuwiki__top"></div>
	<div id="main" class="dokuwiki site mode_<?php echo $ACT ?>">

		<div id="content">
			<div id="article" class="page group">
				<?php html_msgarea() ?>

				<?php tpl_flush() ?>
				<?php tpl_includeFile('pageheader.html') ?>
				<!-- wikipage start -->
				<?php tpl_content(false) ?>
				<!-- wikipage stop -->
				<?php tpl_includeFile('pagefooter.html') ?>
				<?php tpl_flush() ?>
			</div>
			<!-- In order to be able to use :empty, we will need to keep the following and the closing if tag and div tags on the same line -->
			<div id="related">
				<?php tpl_toc() ?>

				<h2>Tools</h2>
				<p><?php tpl_searchform(); ?></p>

				<ul>
 					<li><?php echo (new dokuwiki\Menu\Item\Edit())->asHtmlLink();?></li>
					<li><?php echo (new dokuwiki\Menu\Item\Recent())->asHtmlLink();?></li>
					<li><?php echo (new dokuwiki\Menu\Item\Media())->asHtmlLink();?></li>
					<li><?php echo (new dokuwiki\Menu\Item\Index())->asHtmlLink();?></li>
					<li><?php echo (new dokuwiki\Menu\Item\Login())->asHtmlLink();?></li>
					<li><?php echo (new dokuwiki\Menu\Item\Subscribe())->asHtmlLink();?></li>
				</ul>

				<p><?php tpl_pageinfo() ?></p>

				<!-- ********** ASIDE ********** -->
				<?php if($showSidebar): ?>
					<div id="dokuwiki__aside"><div class="pad include group">
						<h3 class="toggle"><?php echo $lang['sidebar'] ?></h3>
							<div class="content">
								<?php tpl_flush() ?>
								<?php tpl_includeFile('sidebarheader.html') ?>
								<?php tpl_include_page($conf['sidebar'], 1, 1) ?>
								<?php tpl_includeFile('sidebarfooter.html') ?>
							</div>
					</div></div><!-- /aside -->
	         <?php endif; ?></div>
		</div>

	</div>
	<div id="footer" class="main_width">
		<?php include('tpl_footer.php') ?>
	</div>
<!--            <hr class="a11y" /> -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <div id="screen__mode" class="no"></div><?php /* helper to detect CSS media query in script.js */ ?>
	<!--[if ( lte IE 7 | IE 8 ) ]></div><![endif]-->
</body>
</html>
