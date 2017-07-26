<?php /* Smarty version 2.6.13, created on 2011-12-12 16:42:57
         compiled from FRONTEND/contents/tenant-list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/tenant-list.html', 20, false),array('modifier', 'date_format', 'FRONTEND/contents/tenant-list.html', 47, false),)), $this); ?>

<div class="banner">
    <?php if ($this->_tpl_vars['banner']['file']): ?>
        <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
    <?php else: ?>
        <img src="contents/banners/<?php echo $this->_tpl_vars['rootBanner']; ?>
" /> <!--kalo banner gak ada di database, select parentnya-->
    <?php endif; ?>
</div>
<div class="wrapper">
    <h1 class="titlepage pageNav">
        <a class="red" href="tenant.php?pid=<?php echo $this->_tpl_vars['pid']; ?>
"><?php echo $this->_tpl_vars['categoryName']['categoryName']; ?>
</a>
    </h1>
    <div align="right" class="searchTenant">
        <?php if ($this->_tpl_vars['pid'] == '8'): ?><!--explore-->

        <?php elseif ($this->_tpl_vars['pid'] == '9'): ?><!--information-->
            <form method="get">
                <select name="floor">
                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                    <option value="<?php echo $this->_tpl_vars['list'][$this->_sections['j']['index']]['id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['j']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</option>
                    <?php endfor; endif; ?>
                </select>
            <input type="submit" value="GO">
            </form>
        <?php else: ?>
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
        <?php endif; ?>

    </div>
    <div class="content">
        <?php if ($this->_tpl_vars['rootID'] == '5'): ?> <!--content explore-->
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
                <?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID'] == '8'): ?> <!--google map, find us-->
                    <div class="w500L">
                     <iframe src="http://wikimapia.org/#lat=-7.2935119&lon=112.7301657&z=17&l=0&ifr=1&m=w" width="520" height="400" frameborder="0"></iframe>
                    </div>
                    <div class="w300R">
                        <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                        <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                        <p><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['detail']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['detail'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></p>
                        <img class="imgW220" src="contents/tenant/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                    </div>
                <?php else: ?> <!--information-->
                    <div class="w500L">
                        <a href="tenant.php?floor=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
">
                            <img src="contents/tenant/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" width="400" />
                        </a>
                    </div>
                    <div class="w300R">
                        <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                        <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                        <p><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['brief']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp));  endif; ?></p>
                    </div>
                <?php endif; ?>
            <?php endfor; endif; ?>

        <?php else: ?><!-- if content != explore -->
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
            <div class="w400L">
                <?php if (((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['detail'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp))): ?>
                <a href="tenant.php?content=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
">
                    <img class="imgW170" src="contents/tenant/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                </a>
                <?php else: ?>
                    <img class="imgW170" src="contents/tenant/<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['img']; ?>
" />
                <?php endif; ?>
                <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
                <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
                <p><?php if ($this->_tpl_vars['list'][$this->_sections['i']['index']]['brief']): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
 ...<?php endif; ?></p>

                <?php if (((is_array($_tmp=$this->_tpl_vars['list'][$this->_sections['i']['index']]['detail'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp))): ?>
                <a href="tenant.php?content=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['categoryID']; ?>
" class="more">more</a>
                <?php endif; ?>
            </div>
            <?php endfor; endif; ?>
       <?php endif; ?>

        <!--
        <div class="w400L">
            <a href="?index=eaton"><img class="imgW170" src="images/dining/eaton_logo.jpg" /></a>
            <h1 class="tenant">Eaton Bakery and Restaurant</h1>
            <p>Produk-produk Eaton Bakery &amp; Restaurant menggunakan bahan baku pilihan terbaik dan ditangani oleh tangan-tangan yang handal </p>
            <a href="?index=eaton" class="more">more</a>
        </div>


        <div class="w400R">
            <a href="?index=2ndkitchen"><img class="imgW170" src="images/dining/2ndkitchen_logo.jpg" /></a>
            <h1 class="tenant">2nd Kitchen Indonesian Food</h1>
            <a href="?index=2ndkitchen" class="more">more</a>
        </div>
        -->
    </div>


    <hr class="clear" />
    <div class="paging" align="right">
       <?php echo $this->_tpl_vars['page']; ?>

    </div>
</div>