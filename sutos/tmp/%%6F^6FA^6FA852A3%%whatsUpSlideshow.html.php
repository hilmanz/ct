<?php /* Smarty version 2.6.13, created on 2011-05-31 15:38:15
         compiled from ../templates/Article/admin/whatsUpSlideshow.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', '../templates/Article/admin/whatsUpSlideshow.html', 36, false),)), $this); ?>
<strong>WHAT'S UP SETTING</strong><br>
<br>
<table class="addlist" width="100%" border="0" cellpadding="5" cellspacing="0">
    <tr class="head">
        <td height="33"><strong>IMAGE 1</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Preview Image
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['slide1']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>New Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <font color="red">width = 375px, height = 505px</font>
                            <strong><br /></strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Link to</strong></td>
                        <td><select name="pageID" id="pageID">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['group'][$this->_sections['i']['index']]['categoryName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                            <script>document.getElementById('pageID').value="<?php echo $this->_tpl_vars['slide1']['pageID']; ?>
";</script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Status</strong>
                        </td>
                        <td>
                            <select name="status1" id="status1">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <script>document.getElementById("status1").value=("<?php echo $this->_tpl_vars['slide1']['published']; ?>
")</script>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="article">
                            <input name="r" type="hidden" id="r" value="whatsUpSlideshow">
                            <input name="do" type="hidden" id="do" value="update">
                            <input name="id" type="hidden" id="id" value="1">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>
<br>

<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td class="" height="33"><strong>IMAGE 2</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Preview Image
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['slide2']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>New Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <font color="red">width = 375px, height = 505px</font>
                            <strong><br /></strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Link to</strong></td>
                        <td><select name="pageID2" id="pageID2">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['group'][$this->_sections['i']['index']]['categoryName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                            <script>document.getElementById('pageID2').value="<?php echo $this->_tpl_vars['slide2']['pageID']; ?>
";</script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Status</strong>
                        </td>
                        <td><?php echo $this->_tpl_vars['slide']['published']; ?>

                            <select name="status2" id="status2">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <script>document.getElementById("status2").value=("<?php echo $this->_tpl_vars['slide2']['published']; ?>
")</script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="article">
                            <input name="r" type="hidden" id="r" value="whatsUpSlideshow">
                            <input name="do" type="hidden" id="do" value="update">
                            <input name="id" type="hidden" id="id" value="2">
                        </td>
                    </tr>
                </table>
        </form></td>
    </tr>
</table>


<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td height="33"><strong>IMAGE 3</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">

                    <tr>
                        <td>
                            <strong>
                                Preview Image
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['slide3']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>New Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <font color="red">width = 375px, height = 505px</font>
                            <strong><br /></strong>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Link to</strong></td>
                        <td><select name="pageID3" id="pageID3">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['group'][$this->_sections['i']['index']]['categoryName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                            <script>document.getElementById('pageID3').value="<?php echo $this->_tpl_vars['slide3']['pageID']; ?>
";</script>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Status</strong>
                        </td>
                        <td>
                            <select name="status3" id="status3">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <script>document.getElementById("status3").value=("<?php echo $this->_tpl_vars['slide3']['published']; ?>
")</script>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="article">
                            <input name="r" type="hidden" id="r" value="whatsUpSlideshow">
                            <input name="do" type="hidden" id="do" value="update">
                            <input name="id" type="hidden" id="id" value="3">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>




<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td height="33"><strong>IMAGE 4</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Preview Image
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['slide4']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>New Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <font color="red">width = 375px, height = 505px</font>
                            <strong><br /></strong>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Link to</strong></td>
                        <td><select name="pageID4" id="pageID4">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['group'][$this->_sections['i']['index']]['categoryName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                            <script>document.getElementById('pageID4').value="<?php echo $this->_tpl_vars['slide4']['pageID']; ?>
";</script>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Status</strong>
                        </td>
                        <td>
                            <select name="status4" id="status4">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <script>document.getElementById("status4").value=("<?php echo $this->_tpl_vars['slide4']['published']; ?>
")</script>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="article">
                            <input name="r" type="hidden" id="r" value="whatsUpSlideshow">
                            <input name="do" type="hidden" id="do" value="update">
                            <input name="id" type="hidden" id="id" value="4">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>

<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td height="33"><strong>IMAGE 5</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <td>
                            <strong>
                                Preview Image
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['slide5']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>New Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <font color="red">width = 375px, height = 505px</font>
                            <strong><br /></strong>
                        </td>
                    </tr>

                    <tr>
                        <td><strong>Link to</strong></td>
                        <td><select name="pageID5" id="pageID5">
                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['i']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['group'][$this->_sections['i']['index']]['categoryName'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                            <script>document.getElementById('pageID5').value="<?php echo $this->_tpl_vars['slide5']['pageID']; ?>
";</script>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Status</strong>
                        </td>
                        <td>
                            <select name="status5" id="status5">
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                            <script>document.getElementById("status5").value=("<?php echo $this->_tpl_vars['slide5']['published']; ?>
")</script>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="article">
                            <input name="r" type="hidden" id="r" value="whatsUpSlideshow">
                            <input name="do" type="hidden" id="do" value="update">
                            <input name="id" type="hidden" id="id" value="5">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>

<p>&nbsp;</p>