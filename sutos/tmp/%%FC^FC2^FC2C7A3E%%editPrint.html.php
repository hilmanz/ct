<?php /* Smarty version 2.6.13, created on 2011-03-04 19:14:44
         compiled from ../templates/Article/admin/editPrint.html */ ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=print&r=<?php echo $this->_tpl_vars['url']; ?>
">Print</a> - Edit Image To Print</td>
    </tr>
    <tr>
        <td height="34"><strong><a href="?s=print">PRINT</a></strong> - <strong>UPLOAD IMAGE</strong></td>
    </tr>
    <tr>
        <td>
            <form method="post" enctype="multipart/form-data" action="index.php?s=print&r=saveEdit">
                            <table class="addlist">

                                <!-- sementara belum dipakai
                                <tr>
                                    <td><strong>Category</strong></td>
                                    <td>
                                        <select name="category">
                                            <?php if ($this->_tpl_vars['categoryID'] == '4'): ?>
                                            <option value="4" selected>Club</option>
                                            <option value="5">Offers</option>
                                            <?php elseif ($this->_tpl_vars['categoryID'] == '5'): ?>
                                            <option value="4">Club</option>
                                            <option value="5" selected>Offers</option>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                -->
                                
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td>
                                        <input type="text" name="description" size="40" value="<?php echo $this->_tpl_vars['list']['description']; ?>
">
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Old Image</strong></td>
                                    <td>
                                        <img src="../contents/print/<?php echo $this->_tpl_vars['list']['image']; ?>
" width="200">
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Image</strong></td>
                                    <td><input type="file" name="file" id="file" />
                                        <br />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['list']['id']; ?>
">
                                        <input type="hidden" name="categoryID" value="<?php echo $this->_tpl_vars['list']['categoryID']; ?>
">
                                        <input type="submit" name="button" id="button" value="SAVE" />
                                    </td>
                                </tr>
                            </table><br />
                        </form>
        </td>
    </tr>
</table>