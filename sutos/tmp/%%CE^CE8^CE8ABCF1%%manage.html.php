<?php /* Smarty version 2.6.13, created on 2011-10-14 19:08:40
         compiled from HomepageSetting/admin/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'HomepageSetting/admin/manage.html', 14, false),)), $this); ?>
<strong>Homepage Settings</strong><br>
<br>
<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td class="" height="33"><strong>HOMEPAGE SET 1</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <!--
                    <tr>
                        <td width="132" ><strong>Title</strong></td>
                        <td width="425"><input name="title" type="text" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['box3']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" size="50"></td>
                    </tr>
                    <tr>
                        <td  valign="top"><strong>Small Brief</strong></td>
                        <td>
                            <textarea name="brief" cols="50" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['box3']['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                        </td>
                    </tr>
                    -->

                    <tr>
                        <td>
                            <strong>
                                Image File
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/<?php echo $this->_tpl_vars['box1']['image']; ?>
" width="200">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <strong><br /></strong>
                        </td>
                    </tr>


                    <tr>
                        <td ><strong>Link to</strong></td>
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
                            <script>document.getElementById('pageID').value="<?php echo $this->_tpl_vars['box1']['pageID']; ?>
";</script>
                        </td>
                    </tr>


                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="homepageSetting">
                            <input name="r" type="hidden" id="r" value="update">
                        <input name="box" type="hidden" id="box" value="1"></td>
                    </tr>
                </table>
        </form></td>
    </tr>
</table>


<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td class="" height="33"><strong>HOMEPAGE SET 2</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <!--
                    <tr>
                        <td width="132" ><strong>Title</strong></td>
                        <td width="425"><input name="title" type="text" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['box3']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" size="50"></td>
                    </tr>
                    <tr>
                        <td  valign="top"><strong>Small Brief</strong></td>
                        <td>
                            <textarea name="brief" cols="50" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['box3']['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                        </td>
                    </tr>
                    -->

                    <tr>
                        <td>
                            <strong>
                                Image File
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['box2']['image']; ?>
" width="200">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <strong>Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <strong><br /></strong>
                        </td>
                    </tr>


                    <tr>
                        <td ><strong>Link to</strong></td>
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
                            <script>document.getElementById('pageID2').value="<?php echo $this->_tpl_vars['box2']['pageID']; ?>
";</script>
                        </td>
                    </tr>


                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="homepageSetting">
                            <input name="r" type="hidden" id="r" value="update">
                        <input name="box" type="hidden" id="box" value="2"></td>
                    </tr>
                </table>
        </form></td>
    </tr>
</table>


<table width="100%" border="0" cellpadding="5" cellspacing="0" class="addlist">
    <tr class="head">
        <td height="33"><strong>HOMEPAGE SET 3</strong></td>
    </tr>
    <tr>
        <td>
            <form name="form1" method="post" action="" enctype="multipart/form-data">
                <table class="addlist" width="577" border="0" cellspacing="0" cellpadding="5">
                    <!--
                    <tr>
                        <td width="132"><strong>Title</strong></td>
                        <td width="425"><input name="title" type="text" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['box4']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" size="50"></td>
                    </tr>
                    <tr>
                        <td  valign="top"><strong>Small Brief</strong></td>
                        <td>
                            <textarea name="brief" cols="50" rows="2"><?php echo ((is_array($_tmp=$this->_tpl_vars['box4']['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                        </td>
                    </tr>
                    -->

                    <tr>
                        <td>
                            <strong>
                                Image File
                            </strong>
                        </td>
                        <td>
                            <img src="../contents/static/thumb_<?php echo $this->_tpl_vars['box3']['image']; ?>
" width="200">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Image</strong>
                            <br />
                        </td>
                        <td>
                            <input type="file" name="file" id="file" />
                            <strong><br /></strong>
                        </td>
                    </tr>


                    <tr>
                        <td ><strong>Link to</strong></td>
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
                            <script>document.getElementById('pageID3').value="<?php echo $this->_tpl_vars['box3']['pageID']; ?>
";</script>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <input type="submit" name="button" id="button" value="Save">
                            <input name="s" type="hidden" id="s" value="homepageSetting">
                            <input name="r" type="hidden" id="r" value="update">
                            <input name="box" type="hidden" id="box" value="3">
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
</table>

<p>&nbsp;</p>