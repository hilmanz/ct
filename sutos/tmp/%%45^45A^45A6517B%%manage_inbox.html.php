<?php /* Smarty version 2.6.13, created on 2011-01-11 10:53:22
         compiled from ../templates/Contact/manage_inbox.html */ ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=contact">Contact</a> -
        Manage Inbox</td>
    </tr>
    <tr>
        <td height="34"><strong>CONTACT</strong> - INBOX</td>
    </tr>
    <tr>
        <td>
            <table class="list">
                <tr>
                    <td>
                        <strong>Recipient</strong>
                    </td>
                    <td colspan="6">
                        <strong> : <?php echo $this->_tpl_vars['staff']['staff_name']; ?>
</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Subject</strong>
                    </td>
                    <td colspan="6">
                        <strong> : <?php echo $this->_tpl_vars['staff']['subject']; ?>
</strong>
                    </td>
                </tr>

                <tr>
                    <td>
                        <strong>Total Message</strong>
                    </td>
                    <td colspan="6">
                        <strong> : <?php echo $this->_tpl_vars['total']; ?>
</strong>
                    </td>
                </tr>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><strong>Phone</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Address</strong></td>
                    <td><strong>Message</strong></td>
                    <td><strong>Sending Time</strong></td>
                    <td align="center"><strong>Action</strong></td>
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
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['name']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['phone']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['email']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['address']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['message']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['updated']; ?>
</td>
                    <td align="center">
                        <a class="deletePage" href="?s=contact&amp;r=deleteMessage&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;staffID=<?php echo $this->_tpl_vars['staffID']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['idCategory']; ?>
">
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