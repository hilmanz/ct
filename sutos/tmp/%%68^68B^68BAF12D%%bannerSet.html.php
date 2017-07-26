<?php /* Smarty version 2.6.13, created on 2011-01-12 10:52:06
         compiled from ../templates/Banners/admin/bannerSet.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', '../templates/Banners/admin/bannerSet.html', 29, false),)), $this); ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - Banner Setting - Manage</td>
    </tr>
    <tr>
        <td height="34"> <p><strong>BANNER SETTING(S)</strong> |
                        <font color="red" style="font-size:12px">
                            All Banners width = 961px, height = 291px
                        </font>
                        </p></td>
    </tr>
    <tr>
        <td valign="top">
           <table class="list">
                            <tr>
                                <td><strong>Description</strong></td>
                                <td width="28%"><strong>Image(s)</strong></td>
                                <!--<td width="40%"><strong>URL</strong></td>
                                <td width="15%"><strong>Type</strong></td>-->
                                <td width="17%"><strong>Uploaded</strong></td>
                                <td><strong>Status</strong></td>
                                <td width="17%"><strong>Action</strong></td>
                            </tr>
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
                            <tr>
                                <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['description']; ?>
</td>
                                <td><img src="../contents/banners/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['file']; ?>
" width="150"></td>
                                <!--<td><a href="<?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['path'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['path'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></td>
                                <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['type']; ?>
</td>-->
                                <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['upload_date']; ?>
</td>
                                <td align="center">
                                    <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['published'] == '1'): ?>
                                        <a class="publish" href="?s=bannerSet&amp;r=setStatus&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;status=0">Publish</a>
                                    <?php else: ?>
                                        <a class="upblish" href="?s=bannerSet&amp;r=setStatus&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;status=1">Unpublish</a>
                                    <?php endif; ?>
                                </td>
                                <td><a class="addSubPage" href="?s=bannerSet&amp;r=updatePage&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
">Update</a></td>
                            </tr>
                            <?php endfor; endif; ?>
                        </table>
        </td>
    </tr>
</table>