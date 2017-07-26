<?php /* Smarty version 2.6.13, created on 2011-10-20 16:42:25
         compiled from ../templates/Article/admin/managePrint.html */ ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - Print - Manage</td>
    </tr>
    <tr>
        <td height="34"><strong>PRINT</strong> -
                    <a href="?s=print&amp;r=new">[New Print]/[SHARE]</a></td>
    </tr>
    <tr>
        <td width="533" valign="top">
 <table class="list">
                            <tr>
                                <!--<td width="14%"><strong>Category</strong></td>-->
                                <!--<td width="27%"><strong>Status</strong></td>-->
                                <td width="10%"><strong>Description</strong></td>
                                <td width="17%"><strong>Image</strong></td>
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
                                <!--<td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryName']; ?>
</td>-->
                                <!--<td>Published</td>-->
                                <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['description']; ?>
</td>
                                <td>
                                    <img src="../contents/print/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['image']; ?>
" width="100">
                                </td>
                                <td>
                                    
                                    <a class="addSubPage" href="?s=print&amp;r=edit&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">Edit</a>&nbsp;
                                   
                                    <a class="deletePage" href="?s=print&amp;r=delete&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
">Delete</a>
                                </td>
                            </tr>
                            <?php endfor; endif; ?>
                        </table>
                        <?php echo $this->_tpl_vars['paging']; ?>

                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <br />
                        </form>
        </td>
    </tr>
</table>