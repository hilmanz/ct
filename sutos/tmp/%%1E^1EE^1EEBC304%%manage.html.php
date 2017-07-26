<?php /* Smarty version 2.6.13, created on 2011-10-20 16:48:28
         compiled from Article/admin/manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strtoupper', 'Article/admin/manage.html', 30, false),array('modifier', 'stripslashes', 'Article/admin/manage.html', 37, false),array('modifier', 'date_format', 'Article/admin/manage.html', 59, false),)), $this); ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=article">Article</a> - Manage</td>
    </tr>
    <tr>
        <td height="34"><strong>ARTICLES</strong> -
            <a href="?s=article&r=whatsUpSetting">[WHAT'S UP SETTING]</a> -
        <a href="?s=article&amp;r=new">[New Article]</a></td>
    </tr>
    <tr>
        <td valign="top">
            <table class="list">
                <tr>
                    <td><form id="form2" name="form2" method="get" action="">
                            Browse by Category :<br />
                            <select name="categoryID" id="categoryID">

                                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                                <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['j']['index']]['id']; ?>
"> <?php echo $this->_tpl_vars['group'][$this->_sections['j']['index']]['categoryName']; ?>
 </option>

                                <?php endfor; endif; ?>

                            </select>
                            <script>document.getElementById('categoryID').value='<?php echo $this->_tpl_vars['categoryID']; ?>
';</script>
                            <input type="submit" name="button" id="button" value="GO" />
                            <input name="s" type="hidden" id="s" value="article" />
                        </form>
                    <strong><?php echo ((is_array($_tmp=$this->_tpl_vars['groupName'])) ? $this->_run_mod_handler('strtoupper', true, $_tmp) : strtoupper($_tmp)); ?>
</strong> </td>
                    <td colspan="6"><form id="form2" name="form2" method="get" action="">
                            Browse by Article : <br />
                            <select name="articleID" id="articleID">

                                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['article']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                                <option value="<?php echo $this->_tpl_vars['article'][$this->_sections['j']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['article'][$this->_sections['j']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>

                                <?php endfor; endif; ?>

                            </select>
                            <script>document.getElementById('articleID').value='<?php echo $this->_tpl_vars['articleID']; ?>
';</script>
                            <input type="submit" name="button" id="button" value="GO" />
                            <input name="s" type="hidden" id="s" value="article" />
                    </form></td>
                </tr>
                <tr>
                    <td width="30%"><strong>Title</strong></td>
                    <td width="15%"><strong>Posted</strong></td>
                    <td width="30%"><strong>Category</strong></td>
                    <!--<td width="27%"><strong>Status</strong></td>-->
                    <td align="center"><strong>Headline Image</strong></td>
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
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</td>
                    <td><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%Y") : smarty_modifier_date_format($_tmp, "%d-%m-%Y")); ?>
</td>
                    <td> <?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryName']; ?>

                    <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['events']): ?> <font color="green">(<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['events']; ?>
)</font> <?php endif; ?> </td>
                    <!--<td>Published</td>-->
                    <td><img style="border:solid 1px #CCCCCC" src="../contents/article/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" width="118" height="28" /> </td>
                    <td> <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['status'] == '1'): ?> <a class="publish" href="?s=article&amp;r=setStatus&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;status=0"> Publish </a> <?php else: ?> <a class="upblish" href="?s=article&amp;r=setStatus&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;status=1"> Unpublish </a> <?php endif; ?> </td>
                    <td>
                        <a class="addSubPage" href="?s=article&amp;r=edit&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&amp;categoryID=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">Edit</a>&nbsp;
                        <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '4' || $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '5'): ?>
                        
                        <?php else: ?>
                        <a class="deletePage" href="?s=article&amp;r=delete&amp;id=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
">Delete</a> 
                        <?php endif; ?>
                    </td>
                    </td>
                </tr>
                <?php endfor; endif; ?>
            </table>
            <?php echo $this->_tpl_vars['page']; ?>

            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <br />
        </form>      </td>
    </tr>
</table>