<?php /* Smarty version 2.6.13, created on 2011-10-20 16:36:16
         compiled from ../templates/Article/admin/newPrint.html */ ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=print&r=manageOffers">Print</a> - New Image To Print</td>
    </tr>
    <tr>
        <td height="34"><strong><a href="?s=print">PRINT</a></strong> - <strong>UPLOAD IMAGE</strong></td>
    </tr>
    <tr>
        <td>
            <form method="post" enctype="multipart/form-data" action="index.php?s=print&r=add">
                            <table class="addlist">
                                
                                <tr>
                                    <td><strong>Category</strong></td>
                                    <td>
                                        <select name="category">
                                            <option value="4">Club</option>
                                            <option value="5">Offers</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td><strong>Description</strong></td>
                                    <td>
                                        <input type="text" name="description" size="40">
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
                                        <input type="submit" name="button" id="button" value="SAVE" />
                                    </td>
                                </tr>
                            </table><br />
                        </form>
        </td>
    </tr>
</table>