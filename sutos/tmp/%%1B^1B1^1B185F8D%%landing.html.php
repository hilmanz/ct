<?php /* Smarty version 2.6.13, created on 2010-03-17 15:18:14
         compiled from FRONTEND/contents/Article/landing.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/Article/landing.html', 5, false),)), $this); ?>
<?php if ($this->_tpl_vars['news']): ?>
<p><H2><?php echo $this->_tpl_vars['descriptionContent']; ?>
</H2><BR />

<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['news']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <span class="style2"><?php echo ((is_array($_tmp=$this->_tpl_vars['news'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span><BR />
    <span class="testi"><?php echo $this->_tpl_vars['news']['posted']; ?>
</span></p><br>
    <?php if ($this->_tpl_vars['news'][$this->_sections['i']['index']]['img']): ?>
    <img src="contents/article/<?php echo $this->_tpl_vars['news'][$this->_sections['i']['index']]['img']; ?>
" width="250px" height="133px">
    <br><br>
    <?php else: ?>
    NO IMAGE PREVIEW<br><br>
    <?php endif; ?>
    <?php echo $this->_tpl_vars['news'][$this->_sections['i']['index']]['brief']; ?>

    <a class="artikel" href="article.php?id=<?php echo $this->_tpl_vars['news'][$this->_sections['i']['index']]['id']; ?>
">
    <br><strong>more >></strong>
    </a>
    <hr><br>
    
<?php endfor; endif; ?>
<?php else: ?>
<span class="testi">Not Available Yet</span>
<?php endif; ?>


<?php if ($this->_tpl_vars['press']): ?>
<p><H2>PRESS RELEASE</H2><BR />
<?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['press']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <span class="style2">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['press'][$this->_sections['j']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>

    </span><BR />
    <p>
    <?php echo $this->_tpl_vars['news'][$this->_sections['j']['index']]['brief']; ?>

    <a class="artikel" href="article.php?id=<?php echo $this->_tpl_vars['news'][$this->_sections['j']['index']]['id']; ?>
">
    <br><strong>more >></strong><br><br>
    </a>
    </p>
    <span class="testi"><?php echo $this->_tpl_vars['press'][$this->_sections['j']['index']]['posted']; ?>
</span>
</p>
<?php endfor; endif; ?>
<?php endif; ?>