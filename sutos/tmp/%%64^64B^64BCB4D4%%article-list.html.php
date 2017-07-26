<?php /* Smarty version 2.6.13, created on 2011-12-12 15:20:11
         compiled from FRONTEND/contents/article-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/article-list.html', 60, false),array('modifier', 'date_format', 'FRONTEND/contents/article-list.html', 61, false),)), $this); ?>

<div class="calendar">
    <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
</div>
<div class="wrapper">
    <h1 class="titlepage pageNav">
        <?php echo $this->_tpl_vars['monthEvent']; ?>

    </h1>
    
    <h1 class="titlepage pageNav">
        <a class="blue3" href="?index=explore">Whats'up</a> |
        <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['rootName']['id']; ?>
"><?php echo $this->_tpl_vars['rootName']['categoryName']; ?>
</a> |
        <?php echo $this->_tpl_vars['categoryName']['categoryName']; ?>

    </h1>


    <div align="right" class="searchTenant">
        <form method="get">
            <input type="hidden" name="content" value="<?php echo $this->_tpl_vars['categoryName']['id']; ?>
">
            <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['rootName']['id']; ?>
">
            <select name="month" id="month">
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
            <script>document.getElementById('month').value='<?php echo $this->_tpl_vars['monthEvent']; ?>
';</script>
            <input type="submit" value="GO">
        </form>
    </div>

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
            <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['detail']): ?>
            <a class="alist" href="whatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">
                <?php if ($this->_tpl_vars['rootName']['id'] == '3'): ?> <!--about us-->
                <img class="imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php else: ?>
                <img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php endif; ?>
            </a>
            <?php else: ?>
            	<?php if ($this->_tpl_vars['rootName']['id'] == '3'): ?> <!--about us-->
				<img class="imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
				<?php else: ?>
				<img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php endif; ?>

            <?php endif; ?>
            <div class="text">
                <h1 class="title"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
            </div>
        </div>
    </div>
    <?php endfor; endif; ?>
    <hr class="clear" />
</div>