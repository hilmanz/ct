<?php /* Smarty version 2.6.13, created on 2011-12-12 16:38:25
         compiled from FRONTEND/contents/tenant-detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/tenant-detail.html', 5, false),array('modifier', 'date_format', 'FRONTEND/contents/tenant-detail.html', 21, false),array('modifier', 'htmlentities', 'FRONTEND/contents/tenant-detail.html', 32, false),array('modifier', 'urlencode', 'FRONTEND/contents/tenant-detail.html', 32, false),)), $this); ?>
<div class="banner">
    <img src="contents/tenant/<?php echo $this->_tpl_vars['list']['bannerImg']; ?>
" />
</div>
<div class="wrapper">
    <h1 class="titlepage pageNav"><a class="red" href="tenant.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
"><?php echo $this->_tpl_vars['categoryName']['categoryName']; ?>
</a> | <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
    
    <div align="right" class="searchTenant">
        <form method="get">
            <select name="content">
                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['searchDetail']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $this->_tpl_vars['searchDetail'][$this->_sections['j']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['searchDetail'][$this->_sections['j']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                <?php endfor; endif; ?>
            </select>
            <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['categoryName']['id']; ?>
">
            <input type="submit" value="GO">
        </form>
    </div>

    <div class="content">
        <h1 class="title detail"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
        <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
        <?php if (((is_array($_tmp=$this->_tpl_vars['list']['details'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp))): ?>
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['details'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>


        <p><strong>Share To</strong></p>

        <a name="fb_share" type="icon_link" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Ftownsquare.co.id/sutos/html%2Ftenant.php?content=<?php echo $this->_tpl_vars['list']['id']; ?>
&amp;cid=<?php echo $this->_tpl_vars['pid']; ?>
" target="_blank">
            <img src="contents/images/facebook.gif">
        </a>

        <a href="http://twitter.com/home?status=I+heart+this+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
+at+http://townsquare.co.id/sutos/html/tenant.php?content=<?php echo $this->_tpl_vars['list']['id']; ?>
&amp;cid=<?php echo $this->_tpl_vars['pid']; ?>
" title="Click to share this post on Twitter" target="_blank" >
            <img src="contents/images/twitter.gif">
        </a>
        <?php else: ?>
        This Tenant Contain No Detail..
        <?php endif; ?>

    </div>

    
    <hr class="clear" />
</div>