<?php /* Smarty version 2.6.13, created on 2011-12-12 16:19:49
         compiled from FRONTEND/contents/article-tag-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/article-tag-list.html', 90, false),array('modifier', 'htmlentities', 'FRONTEND/contents/article-tag-list.html', 95, false),array('modifier', 'urlencode', 'FRONTEND/contents/article-tag-list.html', 95, false),)), $this); ?>


<div class="calendar">
	<?php if ($this->_tpl_vars['banner']['file']): ?>
    <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
    	<?php else: ?>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="FlashID" width="960" height="290" id="FlashID">
    <param name="movie" value="flash/april.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="9.0.45.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don�t want users to see the prompt. -->
        <param name="expressinstall" value="js/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="flash/april.swf" width="960" height="290">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="9.0.45.0" />
            <param name="expressinstall" value="js/expressInstall.swf" />
            <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
            <div>
                <h4 align="center" style="color:#FFFFFF">Content on this page requires a newer version of Adobe Flash Player.</h4>
                <p align="center"><a href="http://www.adobe.com/go/getflashplayer"><img src="images/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>
            </div>
            <!--[if !IE]>-->
        </object>
        <!--<![endif]-->
    </object>
  <?php endif; ?></div>

<div class="wrapper">

    <h1 class="titlepage pageNav"><a class="blue3" href="whatsUp.php">Whats'up</a>
    | <?php echo $this->_tpl_vars['categoryName']; ?>
 | <?php echo $this->_tpl_vars['month']; ?>
</h1>

    <div align="right" class="searchTenant">

            <form method="get" action="landingTag.php">
                <input type="hidden" name="pid" value="<?php echo $this->_tpl_vars['categoryID']; ?>
">
                <select name="events" id="events">
                    <option value="January">JANUARY</option>
                    <option value="February">FEBRUARY</option>
                    <option value="March">MARCH</option>
                    <option value="April">APRIL</option>
                    <option value="May">MAY</option>
                    <option value="June">JUNE</option>
                    <option value="JULY">JULY</option>
                    <option value="August">AUGUST</option>
                    <option value="September">SEPTEMBER</option>
                    <option value="October">OCTOBER</option>
                    <option value="November">NOVEMBER</option>
                    <option value="December">DECEMBER</option>
                </select>
                <script>document.getElementById('events').value='<?php echo $this->_tpl_vars['categoryNameSelected']; ?>
';</script>
                <input type="submit" value="GO">
            </form>


    </div>
    <div class="content">

        <div class="rowArticle">
            <div style="position:relative;">
                <!-- making selection area -->

                <?php if ($this->_tpl_vars['photo']): ?>
                <img src="contents/article/<?php echo $this->_tpl_vars['photo']; ?>
" name="imageid" border="0" class="annotated" id="imageid" />
                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['photoTagName']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                    <style type='text/css'>
                        #map a.<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['title']; ?>

                        <?php echo '
                        {
                        '; ?>


                            top:<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['y1']; ?>
px;
                            left:<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['x1']; ?>
px;
                            width:<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['width']; ?>
px;
                            height:<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['height']; ?>
px;

                        <?php echo '
                        }
                        '; ?>

                    </style>
                    <!-- tag result element -->
                    <ul id="map">
                        <li>

                            <a class="<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['title']; ?>
" href="javascript:q=(document.location.href);void(window.open('http://townsquare.co.id/sutos/html/print.php?name=<?php echo ((is_array($_tmp=$this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['url'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
&amp;categoryID=<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['categoryID']; ?>
&amp;url='+escape(q),'','resizable,location,menubar,toolbar,scrollbars,status,height=445,width=600,left=350,top=590,screenX=100,screenY=100'));">
                                <span><b><?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['title']; ?>
</b></span>
                            </a>

                            <!-- IE not support for this js action onclick(window.open) 01-04-2010, link
                            <a class="<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['title']; ?>
" href="#" onClick="window.open('print.php?name=<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['url'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
&amp;categoryID=<?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['categoryID']; ?>
','PRINT/SHARE','width=393,height=300,left=430,top=590,screenX=300,screenY=300')">
                                <span><b><?php echo $this->_tpl_vars['photoTagName'][$this->_sections['i']['index']]['title']; ?>
</b></span>
                            </a> -->

                        </li>
                    </ul>
                <?php endfor; endif; ?>
                <?php else: ?>
                    <h1>
                        No Updates On <?php echo $this->_tpl_vars['categoryName']; ?>
 This Month
                    </h1>

                <?php endif; ?>
            </div>
        </div>

    </div>
    <hr class="clear" />
</div>