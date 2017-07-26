<?php /* Smarty version 2.6.13, created on 2011-12-12 16:08:15
         compiled from FRONTEND/contents/article-detail.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/contents/article-detail.html', 30, false),array('modifier', 'date_format', 'FRONTEND/contents/article-detail.html', 55, false),array('modifier', 'htmlentities', 'FRONTEND/contents/article-detail.html', 64, false),array('modifier', 'urlencode', 'FRONTEND/contents/article-detail.html', 64, false),)), $this); ?>

<div class="calendar">
    <?php if ($this->_tpl_vars['banner']['file']): ?>
    <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
    <?php else: ?>
    <img src="contents/article/<?php echo $this->_tpl_vars['list']['bannerImg']; ?>
" />
    <?php endif; ?>
</div>


<div class="wrapper">
    <h1 class="titlepage pageNav">
        <?php echo $this->_tpl_vars['month']['events']; ?>

    </h1>

    <h1 class="titlepage pageNav">
        <a class="blue3" href="?index=explore">Whats'up</a> |

        <?php if ($this->_tpl_vars['parent']['id']): ?>
        <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['parent']['id']; ?>
"><?php echo $this->_tpl_vars['parent']['categoryName']; ?>
</a> |
        <?php endif; ?>

        <?php if ($this->_tpl_vars['rootName']['id'] == '1'): ?>
        <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['rootName']['id']; ?>
"><?php echo $this->_tpl_vars['rootName']['categoryName']; ?>
</a> |
        <?php else: ?>
        <a href="whatsUp.php?content=<?php echo $this->_tpl_vars['rootName']['id']; ?>
&cid=<?php echo $this->_tpl_vars['rootName']['parentID']; ?>
"><?php echo $this->_tpl_vars['rootName']['categoryName']; ?>
</a> |
        <?php endif; ?>


        <span class="titleDetail"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</span>

    </h1>


    <div align="right" class="searchTenant">
        
        <form method="get">
            <select name="contentDetail" id="contentDetail">
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
            <script>document.getElementById('contentDetail').value='<?php echo $this->_tpl_vars['list']['id']; ?>
';</script>
            <input type="hidden" name="cid" value="<?php echo $this->_tpl_vars['categoryName']['id']; ?>
">
            <input type="submit" value="GO">
        </form>
    </div>

    <div class="content">
        <?php if ($this->_tpl_vars['list']['details']): ?>
        <?php if ($this->_tpl_vars['rootName']['id'] == '3'): ?> <!--about us-->
        <img class="imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list']['img']; ?>
" />
        <?php endif; ?>
        <h1 class="tenant"><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</h1>
        <!--<p><i>Updated : <?php echo ((is_array($_tmp=$this->_tpl_vars['list']['posted_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d-%m-%y") : smarty_modifier_date_format($_tmp, "%d-%m-%y")); ?>
</i></p>-->
        <p><?php echo ((is_array($_tmp=$this->_tpl_vars['list']['details'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</p>

        <p><strong>Share To</strong></p>

        <a name="fb_share" type="icon_link" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Ftownsquare.co.id/sutos/html%2FwhatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list']['id']; ?>
&amp;rid=<?php echo $this->_tpl_vars['list']['rid']; ?>
&cid=<?php echo $this->_tpl_vars['contentDetailId']; ?>
" target="_blank">
            <img src="contents/images/facebook.gif">
        </a>

        <a href="http://twitter.com/home?status=I+heart+this+<?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list']['description'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)))) ? $this->_run_mod_handler('htmlentities', true, $_tmp) : htmlentities($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
+at+http://townsquare.co.id/sutos/html/whatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list']['id']; ?>
&amp;rid=<?php echo $this->_tpl_vars['list']['rid']; ?>
&cid=<?php echo $this->_tpl_vars['contentDetailId']; ?>
" title="Click to share this post on Twitter" target="_blank" >
            <img src="contents/images/twitter.gif">
        </a>
        <?php else: ?>
        <a href="whatsUp.php?contentDetail=<?php echo $this->_tpl_vars['list']['id']; ?>
">
            <?php if ($this->_tpl_vars['rootName']['id']): ?> <!--about us-->
            <img class="imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list']['img']; ?>
" />
            <?php else: ?>
            <img class="imgW400 imgLeft" src="contents/article/<?php echo $this->_tpl_vars['list']['img']; ?>
" />
            <?php endif; ?>
        </a>
        <?php endif; ?>
    </div>
    <hr class="clear" />
</div>