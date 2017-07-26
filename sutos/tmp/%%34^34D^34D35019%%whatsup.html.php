<?php /* Smarty version 2.6.13, created on 2011-12-12 16:08:15
         compiled from FRONTEND/contents/whatsup.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/whatsup.html', 35, false),array('modifier', 'date_format', 'FRONTEND/contents/whatsup.html', 94, false),)), $this); ?>

<div class="calendar">   
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
        </div>
<div class="wrapper">
    <h1 class="titlepage pageNav"><a class="blue3" href="?index=whatsup">Whats'up</a></h1>
    <div align="right" class="searchTenant">
        <form method="get">
            <select name="pid">
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
                    <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['pageID']): ?>
                    <option value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['pageID']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                    <?php endif; ?>
                <?php endfor; endif; ?>
            </select>
            <input type="submit" value="GO">
        </form>
    </div>
    
    <div class="content">
        <table width="900" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td valign="top">
                    <div class="w400L2">
                        <div class="slide">
                            <div id="divTrigger">
                                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['slide']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                                <a href="javascript:;" onClick="openContent(this,'div<?php echo $this->_tpl_vars['slide'][$this->_sections['j']['index']]['id']; ?>
')" id="firstSlide">
                                    <?php echo $this->_tpl_vars['slide'][$this->_sections['j']['index']]['id']; ?>

                                </a>
                                <?php endfor; endif; ?>
                            </div>
                            <!--
                            <div id="divTrigger">
                                <a href="javascript:;" onClick="openContent(this,'div1')" id="firstSlide">1</a>
                                <a href="javascript:;" onClick="openContent(this,'div2')">2</a>
                                <a href="javascript:;" onClick="openContent(this,'div3')">3</a>
                                <a href="javascript:;" onClick="openContent(this,'div4')">4</a>
                                <a href="javascript:;" onClick="openContent(this,'div5')">5</a>
                            </div>
                            -->

                            
                            <div id="divContent">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['slide']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <div id="div<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['id']; ?>
">
                                    <?php if ($this->_tpl_vars['slide'][$this->_sections['i']['index']]['parentID'] == '0'): ?>
                                    <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['pageID']; ?>
">
                                        <img src="contents/static/<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['image']; ?>
" />
                                    </a>
                                    <?php else: ?>
                                    <a href="whatsUp.php?content=<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['pageID']; ?>
&amp;cid=<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['parentID']; ?>
">
                                        <img src="contents/static/<?php echo $this->_tpl_vars['slide'][$this->_sections['i']['index']]['image']; ?>
" />
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <?php endfor; endif; ?>
                            </div>
                            
                        </div>
                    </div>
                </td>
                <td valign="top">
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
                    <div class="w400RW">
                        <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['pageID']; ?>
">
                            <img class="imgW400" src="contents/static/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['image']; ?>
" />
                        </a>
                        <!--<p><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
</p>-->
                        <p><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['brief']; ?>
</p>
                        <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['updated'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</i></p>-->
                    </div>
                    <?php endfor; endif; ?>
                </td>
            </tr>
        </table>
    </div>
    <hr class="clear" />
</div>