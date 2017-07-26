<?php /* Smarty version 2.6.13, created on 2010-12-16 17:32:16
         compiled from Banners/admin/update.html */ ?>

<table class="addlist">
    <tr class="head">
        <td colspan="2" height="34">
            <a href="index.php">Dashboard</a> - <a href="?s=bannerSet">Banner Setting</a> - Update Banner
        </td>
    </tr>
    <form action="?s=bannerSet&amp;r=update" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <tr>
            <td><strong>Old Banner</strong></td>
            <td>
                <img src="../contents/banners/<?php echo $this->_tpl_vars['rs']['file']; ?>
" width="300">
            </td>
        </tr>
        <tr>
            <td><strong>Description</strong></td>
            <td>
                <input type="text" name="description" size="40" value="<?php echo $this->_tpl_vars['rs']['description']; ?>
">
            </td>
        </tr>
        <tr>
            <td><strong>Upload New Banner : </strong></td>
            <td>
                <input type="hidden" value="<?php echo $this->_tpl_vars['rs']['id']; ?>
" name="id">
                <input type="file" name="file" id="file" />
                <input type="submit" name="button" id="button" value="UPLOAD" />
            </td>
        </tr>
    </form>
</table>