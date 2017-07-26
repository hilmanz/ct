<?php /* Smarty version 2.6.13, created on 2011-02-01 10:59:01
         compiled from ../templates/Contact/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtoupper', '../templates/Contact/manage.html', 29, false),)), $this); ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=contact">Contact</a> - Manage</td>
    </tr>
    <tr>
        <td height="34"><strong>CONTACT</strong> -
                        <a href="?s=contact&amp;r=manageSubject">[Manage Subject]</a></td>
    </tr>
    <tr>
        <td>
           <table class="list">
                            <tr>
                            <td colspan="2">
                                <form id="form2" name="form2" method="get" action="">
                                    Subject:<br>
                                    <select name="categoryID" id="categoryID">
                                        <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['category']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                        <option value="<?php echo $this->_tpl_vars['category'][$this->_sections['j']['index']]['id']; ?>
">
                                            <?php echo $this->_tpl_vars['category'][$this->_sections['j']['index']]['subject']; ?>

                                        </option>
                                        <?php endfor; endif; ?>
                                    </select>
                                    <script>document.getElementById('categoryID').value='<?php echo $this->_tpl_vars['categoryById']['id']; ?>
';</script>

                                    <input type="submit" name="button" id="button" value="GO" />
                                    <input name="s" type="hidden" id="s" value="contact" />
                                </form>
                                <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['groupName'])) ? $this->_run_mod_handler('strtoupper', true, $_tmp) : strtoupper($_tmp)); ?>
</strong>
                            </td>
                            <tr>
                                <td><strong>Recipient</strong></td>
                                <td><strong>Action</strong></td>
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
                                <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['staff_name']; ?>
, (<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['staff_email']; ?>
)</td>
                                <td align="center">
                                    <a class="addSubPage" href="?s=contact&amp;r=inbox&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['idCategory']; ?>
">
                                        Inbox
                                    </a>&nbsp;
                                    <a class="addSubPage" href="?s=contact&amp;r=edit&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['idCategory']; ?>
">
                                        Edit
                                    </a>&nbsp;
                                    
                                    <a class="deletePage" href="?s=contact&amp;r=delete&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['idCategory']; ?>
"
                                    onclick="return confirm('All message assign to <?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['staff_name']; ?>
 will be deleted. Are you sure ?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            <?php endfor; endif; ?>
                        </table>
                        <?php echo $this->_tpl_vars['page']; ?>

                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <br />
                        </form>
        </td>
    </tr>
</table>