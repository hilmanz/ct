<?php /* Smarty version 2.6.13, created on 2011-11-22 14:42:38
         compiled from common/admin/admin.html */ ?>
<!-- with design -->
<script src="../Scripts/scriptaculous/lib/prototype.js"></script>
<script src="../Scripts/scriptaculous/src/scriptaculous.js"></script>
<script src="../Scripts/scriptaculous/src/effects.js"></script>
<script src="../Scripts/scriptaculous/src/controls.js"></script>
<!-- phototags -->
<link rel="stylesheet" href="css/jqueryPhotoTags/style.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
<script src="../Scripts/jqueryPhotoTags/jquery-1.3.2.min.js"></script>
<script src="../Scripts/jqueryPhotoTags/jquery.imgareaselect-0.7.min.js"></script>
<script src="../Scripts/jqueryPhotoTags/jquery.load.js"></script>
<!-- /phototags -->
<script>
    <?php echo '
    function preview(str){
        //var popup = window.open ("preview.php","preview");
        //popup.document.getElementById(\'mainContent\').innerHTML = str;
        //alert(popup.document.getElementById(\'mainContent\').innerHTML);
        $(\'popup_preview\').style.display=\'block\';
        var foo = document.viewport.getScrollOffsets();
        new Effect.Move(\'popup_preview\', { x: foo.left, y: foo.top, mode: \'absolute\' });
        //alert(\'yey\');
        $(\'preview\').innerHTML = "";
        new Ajax.Updater(\'preview\', \'preview.php?\'+Math.random(100000), {
            parameters: { CONTENT: str }
        });

        //$(\'popup_preview\').style.top=window.scrollTop;
    }
    function close_preview(){
        $(\'popup_preview\').style.top=0;
        $(\'popup_preview\').style.display=\'none\';

    }
    '; ?>

    <?php echo '
    function confirmDialog(sURL,t){
        var f = false;
        if(t=="delete"){
            if(confirm("By removing this page, all the pages under this page will be inaccessible. Are you sure to delete this Page ?"							)){
                f = true;
            }
        }else if(t=="remove_group"){
            if(confirm("By removing this group, all the contents under the group will be inaccessible. Are you sure to delete this group ? ")){
                f = true;
            }
        }else{
            if(confirm("Are you sure ? ")){
                f = true;
            }
        }
        if(f){
            document.location=sURL;
        }else{
            return false;
        }
    }
    '; ?>

</script>
<div id="body">
    <div id="top">
        <div id="logoCilent"><img src="images/logo.jpg" /></div>
        <div id="topmenu">
            <ul>
                <li><span  class="current"><a href="logout.php">Log Off</a></span></li>
                <!--<li><span><a href="#">Help</a></span></li>-->
                <li><span><a href="index.php?s=admin">Administration</a></span></li>
                <li><span><a href="index.php">Dashboard</a></span></li>
                <li><span><a href="#">Sutos</a></span></li>
                <li><span><a href="../../../html/admin/index.php">Citos</a></span></li>
            </ul>
        </div>
    </div>
    <!-- css menu tree -->
    <div class="nav">
        <?php echo $this->_tpl_vars['NAVIGASI_MENU']; ?>

    </div>
    <div class="mainNav"> Welcome , <?php echo $this->_tpl_vars['user']['username']; ?>

        <?php if ($this->_tpl_vars['isDualLang']): ?>
        <ul>
            <li><a href="<?php echo $this->_tpl_vars['url_to_lang']; ?>
">Switch to <?php echo $this->_tpl_vars['OtherLang']; ?>
</a></li>
        </ul>
    <?php endif; ?> </div>
    <div id="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><?php echo $this->_tpl_vars['content']; ?>
</td>
            </tr>
        </table>
    </div>
</div>
Powered by  KANA | <a href="http://www.kanadigital.com/" target="_blank">http://www.kana.co.id</a>
<!--
<div id="popup_preview" style="position:absolute;z-index:999;top:0;left:0;width:1000px;height:500px;padding:10px;;background-color:#fff;border:1px solid #000;">
<div style="width:950px;text-align:right;padding:5px;"><a href="#" style="color:#000;" onclick="close_preview();">CLOSE</a></div><br/>
<div id="preview" style="overflow:auto;width:950px;height:450px;border:1px #000 solid;"></div>
</div>
<script>
$('popup_preview').style.display='none';
</script>
-->
<script type="text/javascript">var menu=new menu.dd("menu");menu.init("menu","menuhover");</script>