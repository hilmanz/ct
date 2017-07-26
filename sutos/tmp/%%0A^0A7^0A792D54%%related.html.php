<?php /* Smarty version 2.6.13, created on 2010-01-11 11:17:34
         compiled from ../templates/Products/admin/related.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', '../templates/Products/admin/related.html', 14, false),)), $this); ?>

<table width="700" border="0" cellpadding="0" cellspacing="0" class="addlist" >
  <tr>
    <td height="34"><a href="index.php?s=products">Product Management</a> - Related Product Setup</td>
  </tr>
</table>
<form action="" method="get">
        <table width="100%" border="0" cellspacing="0" cellpadding="5" class="list zebra">
          <tr>
            <td class="head" colspan="2"><strong>Current Related Product(s) to <a href="?s=products&r=updatePage&id=<?php echo $this->_tpl_vars['rs']['id']; ?>
"><?php echo $this->_tpl_vars['rs']['Product_Code']; ?>
 - <?php echo $this->_tpl_vars['rs']['Title']; ?>
</a></strong></td>
          </tr>
          <tr>
            <td colspan="2"><?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['related']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
              <?php echo $this->_tpl_vars['related'][$this->_sections['i']['index']]['code']; ?>
 - <?php echo $this->_tpl_vars['related'][$this->_sections['i']['index']]['Title']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['related'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 [ <a href="?s=products&r=related&do=remove&id=<?php echo $this->_tpl_vars['rs']['id']; ?>
&rid=<?php echo $this->_tpl_vars['related'][$this->_sections['i']['index']]['VariantID']; ?>
">remove</a> ]
              <hr size="1"/>
              <?php endfor; endif; ?> </td>
          </tr>
          <tr>
            <td colspan="2" class="head"><strong>Search Product to Relate with</strong></td>
          </tr>
          <tr>
            <td width="18%"><strong>Product Code </strong></td>
            <td width="82%"><input name="strSearchCode" type="text" id="strSearchCode" size="50" maxlength="30" />
              <input type="submit" name="button2" id="button2" value="Search" />
              <input name="s" type="hidden" id="s" value="products" />
              <input name="r" type="hidden" id="r" value="related" />
              <input name="do" type="hidden" id="do" value="search" />
              <input name="id" type="hidden" id="id" value="<?php echo $this->_tpl_vars['rs']['id']; ?>
" /></td>
          </tr>
        </table>
      </form>
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr>
            <td width="100%" valign="top" class="head"><strong>Search Result(s)</strong></td>
          </tr>
          <tr>
            <td valign="top"> <?php unset($this->_sections['i']);
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
              <input name="variantID[]" type="checkbox" id="variantID[]" value="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['VariantID']; ?>
" />
              <?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['code']; ?>
 - <?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['Title']; ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
<br/>
              <?php endfor; endif; ?> </td>
          </tr>
        </table>
        <input name="s" type="hidden" id="s" value="products" />
        <input name="r" type="hidden" id="r" value="related" />
        <input name="do" type="hidden" id="do" value="save" />
        <input name="id" type="hidden" value="<?php echo $this->_tpl_vars['rs']['id']; ?>
">
        <input type="submit" name="button" id="button" value="SAVE" />
      </form>