<?php /* Smarty version 2.6.13, created on 2011-12-12 16:05:25
         compiled from FRONTEND/contents/article-events.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/article-events.html', 64, false),)), $this); ?>

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
    <h1 class="titlepage pageNav">
        <a class="blue3" href="?index=explore">Whats'up</a> | <a class="blue3" href="whatsUp.php?pid=1">Events</a> |
        <?php echo $this->_tpl_vars['monthEvent']; ?>

    </h1>

    <div align="right" class="searchTenant">
        <form method="get">
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
            <script>document.getElementById('events').value='<?php echo $this->_tpl_vars['monthEvent']; ?>
';</script>
            <input type="submit" value="GO">
        </form>
    </div>


    <?php if ($this->_tpl_vars['list']): ?>
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
    <div class="content">
        <div class="rowArticle">
            <a class="alist" href="whatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">
                <img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
            </a>
            <div class="text">
                <h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
            </div>
        </div>
    </div>
    <?php endfor; endif; ?>
    <?php else: ?>
    <div class="content">
        <div class="rowArticle">
            <div class="text">
                NO EVENTS THIS MONTH
            </div>
        </div>
    </div>

    <?php endif; ?>
    <hr class="clear" />
</div>