<?php
/**
 * Template footer, included in the main and detail files
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();
?>

<!-- ********** FOOTER ********** -->
<div id="dokuwiki__footer">

    <div class="bar" id="footertools">
      <div class="bar-left">
        <?php tpl_button('edit')?>
        <?php tpl_button('history')?>
        <?php tpl_button('recent')?>
        <?php tpl_button('index')?>
        <?php tpl_button('revert')?>
        <?php tpl_button('media')?>
      </div>
      <div class="bar-right">
        <?php tpl_button('subscribe')?>
        <?php tpl_button('admin')?>
        <?php tpl_button('profile')?>
        <?php tpl_button('login')?>
        <?php tpl_button('top')?>
      </div>
      <hr class="a11y" />
    </div>

    <div class="pad">
        <?php tpl_license(''); // license text ?>

        <div class="credit">
            Copyright 2003-<?php echo date('Y'); ?> Xfce Development Team.
        </div>
    </div>

</div><!-- /footer -->

<?php tpl_includeFile('footer.html') ?>
