<?php /* Smarty version 2.6.13, created on 2011-12-11 15:46:42
         compiled from FRONTEND/printPage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/printPage.html', 26, false),array('modifier', 'htmlentities', 'FRONTEND/printPage.html', 31, false),array('modifier', 'urlencode', 'FRONTEND/printPage.html', 31, false),)), $this); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TownSquare</title>
        <link href="css/citos.css" rel="stylesheet" type="text/css" />
        <script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/swfobject_modified.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/slide.js"></script>
        <meta name="description" content="Townsquare, <?php echo $this->_tpl_vars['list']['description']; ?>
" />
        <meta name="keywords" content="Cilandak Townsquare, Surabaya Townsquare" />
        <meta name="author" content="Kanadigital" />
    </head>

    <body style="background:none;" >
        <table border="0" cellpadding="0" cellspacing="0" align="center" class="tablePrint">
            <!-- content disini -->
            <tr>
                <td valign="top" colspan="5">
                    <div align="center"><img class="imagePrint" src="contents/print/<?php echo $this->_tpl_vars['list']['image']; ?>
" width="300"/>                </div></td>
            </tr>
            <tr>
                <td colspan="3">
                    <h1 class="title detail"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>                </td>
            </tr>

            <tr>
                <td colspan="3" align="left">
                    <div align="center"><a class="fbShare" name="fb_share" type="icon_link" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Ftownsquare.co.id/sutos/html%2Fprint.php?name=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
%26categoryID=<?php echo $this->_tpl_vars['list']['categoryID']; ?>
" target="_blank">
                      <img src="contents/images/facebook.gif">                    </a>                        <a class="twitShare" href="http://twitter.com/home?status=I+heart+this+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
+at+http://townsquare.co.id/sutos/html/print.php?name=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
%26categoryID=<?php echo $this->_tpl_vars['list']['categoryID']; ?>
" title="Click to share this post on Twitter" target="_blank" >
                      <img src="contents/images/twitter.gif">              </a> </div></td>
          </tr>


            <?php if ($this->_tpl_vars['list']['categoryID'] == '5'): ?>
            <tr>
                <td colspan="3" align="left">
                    <div align="center">
                        <a class="txtPrint" href="javaScript:window.print()">
                            Print This Image
                        </a>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
            <!--end content -->
        </table>
        <script type="text/javascript">
          <?php echo '
          var _gaq = _gaq || [];
          _gaq.push([\'_setAccount\', \'UA-867847-21\']);
          _gaq.push([\'_trackPageview\']);

          (function() {
            var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
            ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
            var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
          })();
          '; ?>


        </script>
    </body>
</html>
