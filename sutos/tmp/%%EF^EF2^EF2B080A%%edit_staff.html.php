<?php /* Smarty version 2.6.13, created on 2010-06-02 14:23:59
         compiled from ../templates/Contact/edit_staff.html */ ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=contact">Contact</a> -
        Edit Staff</td>
    </tr>
    <tr>
        <td height="34"><strong>CONTACT</strong> - Edit Staff</td>
    </tr>
    <tr>
        <td>
            <form method="post" action="?s=contact&r=edit&do=update">
                            <table class="addlist">
                                <tr>
                                    <td width="14%"><strong>Staff</strong></td>

                                    <td>
                                        <input type="text" name="staffName" size="40" value="<?php echo $this->_tpl_vars['list']['staff_name']; ?>
">

                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['list']['id']; ?>
">
                                        <input type="hidden" name="categoryID" value="<?php echo $this->_tpl_vars['categoryID']; ?>
">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="14%"><strong>Email</strong></td>
                                    <td>
                                        <input type="text" name="staffEmail" size="40" value="<?php echo $this->_tpl_vars['list']['staff_email']; ?>
">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" value="SAVE" id="button">
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <br />
                        </form>
        </td>
    </tr>
</table>