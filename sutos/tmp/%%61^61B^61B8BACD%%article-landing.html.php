<?php /* Smarty version 2.6.13, created on 2011-12-12 16:40:45
         compiled from FRONTEND/contents/article-landing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/article-landing.html', 64, false),array('modifier', 'date_format', 'FRONTEND/contents/article-landing.html', 101, false),array('modifier', 'htmlentities', 'FRONTEND/contents/article-landing.html', 149, false),array('modifier', 'urlencode', 'FRONTEND/contents/article-landing.html', 149, false),)), $this); ?>


<div class="calendar">
	<?php if ($this->_tpl_vars['banner']['file']): ?>
    <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
    	<?php else: ?>
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" name="FlashID" width="960" height="290" id="FlashID">
        <param name="movie" value="flash/oktober2011.swf" />
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don�t want users to see the prompt. -->
        <param name="expressinstall" value="js/expressInstall.swf" />
        <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
              <!--[if !IE]>-->
        <object type="application/x-shockwave-flash" data="flash/oktober2011.swf" width="960" height="290">
            <!--<![endif]-->
            <param name="quality" value="high" />
            <param name="wmode" value="opaque" />
            <param name="swfversion" value="6.0.65.0" />
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
    <h1 class="titlepage pageNav">
        <?php echo $this->_tpl_vars['monthEvent']; ?>

    </h1>

    <h1 class="titlepage pageNav"><a class="blue3" href="whatsUp.php">Whats'up</a>
    | <?php echo $this->_tpl_vars['categoryName']['categoryName']; ?>
</h1>

    <div align="right" class="searchTenant">
        <?php if ($this->_tpl_vars['categoryName']['id'] == '1'): ?> <!--events-->
            <form method="get">
                <select name="events">
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
                <input type="submit" value="GO">

                <!--14-04-2010
                <select name="contentDetail">
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php if ($this->_tpl_vars['events'][$this->_sections['i']['index']]['detail']): ?>
                        <option value="<?php echo $this->_tpl_vars['events'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['events'][$this->_sections['i']['index']]['events'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                        <?php endif; ?>
                    <?php endfor; endif; ?>
                </select>
                <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['categoryName']['id']; ?>
">
                <input type="submit" value="GO">
                -->
            </form>


        <?php elseif ($this->_tpl_vars['categoryName']['id'] == '4' || $this->_tpl_vars['categoryName']['id'] == '5'): ?> <!--club, offers-->
            <!--ga ada detail, maka gak ada dropdown search-->
        <?php else: ?>

            <form method="get">
                <select name="content">
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                        <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['detail']): ?>
                        <option value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['child']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                        <?php endif; ?>
                    <?php endfor; endif; ?>
                </select>
                <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['categoryName']['id']; ?>
">
                <input type="submit" value="GO">
            </form>

        <?php endif; ?>
    </div>
    <div class="content">
        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
        <div class="rowArticle">
            <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '1'): ?> <!--events-->
                <a href="whatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">
                    <img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                </a>
                <div class="text">
                <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 </h1>
                <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                <p><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['brief']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 ...<?php endif; ?></p>
                </div>

            <?php elseif (((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['detail'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp))): ?> <!--all content detail-->
            <a href="whatsUp.php?content=<?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['child']):  echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['child'];  else:  echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'];  endif; ?>&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">
                <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '3'): ?> <!--about us-->
                <img class="imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php else: ?>
                <img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php endif; ?>
            </a>
            <div class="text">
                <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                <p><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['brief']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 ...<?php endif; ?></p>
            </div>
            <?php else: ?>
                <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '4' || $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '5'): ?><!--club n offers-->

                    <div style="position:relative;">
                        <!-- making selection area -->
                        <img src="contents/article/<?php echo $this->_tpl_vars['photoTagged']; ?>
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
                    </div>

                <?php else: ?>
                <img src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <?php endfor; endif; ?>
    </div>
    <hr class="clear" />
</div>