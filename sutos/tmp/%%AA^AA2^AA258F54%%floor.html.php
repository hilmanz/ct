<?php /* Smarty version 2.6.13, created on 2011-12-12 16:37:59
         compiled from FRONTEND/contents/floor.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/floor.html', 21, false),)), $this); ?>

<div class="banner">
    <img src="contents/tenant/<?php echo $this->_tpl_vars['list']['bannerImg']; ?>
" />
</div>
<div class="wrapper">
    <h1 class="titlepage pageNav">
        <a href="tenant.php?pid=<?php echo $this->_tpl_vars['list']['categoryID']; ?>
"><?php echo $this->_tpl_vars['categoryName']['categoryName']; ?>
</a> - <?php echo $this->_tpl_vars['list']['title']; ?>

    </h1>
    <div align="right" class="searchTenant">
        <form method="get">
            <select name="floor">
                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['search']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $this->_tpl_vars['search'][$this->_sections['j']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['search'][$this->_sections['j']['index']]['title']; ?>
</option>
                <?php endfor; endif; ?>
            </select>
            <input type="submit" value="GO">
        </form>
    </div>
    <div class="content">
            <img src="contents/tenant/<?php echo $this->_tpl_vars['list']['img']; ?>
" width="900" />
            <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
<!--            <p><?php echo $this->_tpl_vars['list']['brief']; ?>
</p>-->
            <br>
            <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['details'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>
    </div>
    <hr class="clear" />
</div>