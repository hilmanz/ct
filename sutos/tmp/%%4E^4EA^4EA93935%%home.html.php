<?php /* Smarty version 2.6.13, created on 2011-12-12 16:42:58
         compiled from FRONTEND/home.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'FRONTEND/home.html', 12, false),)), $this); ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>TownSquare Cilandak, Townsquare Surabaya</title>
        

        <meta name="MSSmartTagsPreventParsing" content="TRUE" />
        <meta name="robots" content="noarchive" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="-1" />
        <meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['META_TITLE']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"/>
        <meta name="title" content="Town Square,<?php echo ((is_array($_tmp=$this->_tpl_vars['META_TITLE']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
"/>
        <meta name="keywords" content="Cilandak Town Square, Surabaya Town Square" />
        <meta name="author" content="Kanadigital" />

        <link href="css/citos.css" rel="stylesheet" type="text/css" />
        <script src="js/AC_RunActiveContent.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/swfobject_modified.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/slide.js"></script>
        <!-- phototags -->
        <link rel="stylesheet" href="admin/css/jqueryPhotoTags/style.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <!--<script src="../Scripts/jqueryPhotoTags/jquery-1.3.2.min.js"></script>
        <script src="../Scripts/jqueryPhotoTags/jquery.imgareaselect-0.7.min.js"></script>
        <script src="../Scripts/jqueryPhotoTags/jquery.load.js"></script>
        -->
        <!-- /phototags -->
        
    </head>

    <body>
        <table class="body" width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
            
            <tr>
                <td width="20" valign="top">
                    <img src="images/shd_left.gif" />
                </td>
                <td width="960" valign="top">
                    <!--menu dr sini-->
                    <div class="top">
                        <a href="index.php" class="logoSurabaya">&nbsp;</a>   
                        <div class="sloganSutos">
                            <ul class="navtop">
                                <li><a href="../../html/index2.php">Citos</a>|</li>
                                <li><a href="#">Sutos</a></li>
                            </ul>
                            <a href="http://www.twitter.com/sutossurabaya" class="twitter">&nbsp;</a>
                            <a href="http://www.facebook.com/surabayatownsquare" class="facebook">&nbsp;</a>
                        </div>
                    </div>
                    <div class="navBar">
                        <ul class="dropmenu">
                            <li><a class="dining" href="tenant.php?pid=1">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                 <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="lifestyleMenu">
                                    <?php if ($this->_tpl_vars['dining']): ?>
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dining']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li><a href="tenant.php?pid=<?php echo $this->_tpl_vars['dining'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['dining'][$this->_sections['i']['index']]['categoryName']; ?>
</a></li>
                                    <?php endfor; endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li><a class="hangout" href="tenant.php?pid=2">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                 <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="lifestyleMenu">
                                    <?php if ($this->_tpl_vars['hangout']): ?>
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['hangout']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li><a href="tenant.php?pid=<?php echo $this->_tpl_vars['hangout'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['hangout'][$this->_sections['i']['index']]['categoryName']; ?>
</a></li>
                                    <?php endfor; endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li><a class="lifestyle" href="#">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="lifestyleMenu">
                                    <?php if ($this->_tpl_vars['lifestyle']): ?>
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['lifestyle']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li><a href="tenant.php?pid=<?php echo $this->_tpl_vars['lifestyle'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['lifestyle'][$this->_sections['i']['index']]['categoryName']; ?>
</a></li>
                                    <?php endfor; endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            
                            <li><a class="entertainment" href="tenant.php?pid=4">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                 <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="lifestyleMenu">
                                    <?php if ($this->_tpl_vars['entertainment']): ?>
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['entertainment']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li><a href="tenant.php?pid=<?php echo $this->_tpl_vars['entertainment'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['entertainment'][$this->_sections['i']['index']]['categoryName']; ?>
</a></li>
                                    <?php endfor; endif; ?>
                                    <?php endif; ?>
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>

                            <li><a class="whatsup" href="whatsUp.php">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                 <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="whatsupMenu">
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li>
                                        <?php if ($this->_tpl_vars['menu'][$this->_sections['i']['index']]['id'] == '4' || $this->_tpl_vars['menu'][$this->_sections['i']['index']]['id'] == '5'): ?> <!-- club and offers -->
                                            <a href="landingTag.php?pid=<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['categoryName']; ?>

                                                <![if gt IE 6]>
                                            </a>
                                        <?php else: ?>
                                            <a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['categoryName']; ?>

                                                <![if gt IE 6]>
                                            </a>
                                        <?php endif; ?>
                                    <![if gt IE 6]>
                                    </a>
                                     <![endif]>
                                        <?php if ($this->_tpl_vars['menu'][$this->_sections['i']['index']]['child']): ?>
                                        
                                        <!--[if lte IE 6]><table><tr><td><![endif]-->
                                        <ul class="level3">
                                        <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['menu'][$this->_sections['i']['index']]['child']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <li>
                                                <a href="whatsUp.php?content=<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['child'][$this->_sections['j']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['child'][$this->_sections['j']['index']]['parentID']; ?>
">
                                                <?php echo $this->_tpl_vars['menu'][$this->_sections['i']['index']]['child'][$this->_sections['j']['index']]['categoryName']; ?>

                                                </a>
                                            </li>
                                        <?php endfor; endif; ?>
                                        </ul>
                                        <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                                        <?php endif; ?>
                                    </li>
                                    <?php endfor; endif; ?>
                                    <!-- backup
                                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['listCategory']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                    <li><a href="whatsUp.php?pid=<?php echo $this->_tpl_vars['whatsUp'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['listCategory'][$this->_sections['i']['index']]['categoryName']; ?>
</a>
                                        <?php if ($this->_tpl_vars['listCategory'][$this->_sections['i']['index']]['id'] == '2'): ?>sub updates
                                            <ul>
                                                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['childUpdates']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <li>
                                                    <a href="whatsUp.php?content=<?php echo $this->_tpl_vars['childUpdates'][$this->_sections['j']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['childUpdates'][$this->_sections['j']['index']]['categoryID']; ?>
">
                                                        <?php echo $this->_tpl_vars['childUpdates'][$this->_sections['j']['index']]['categoryName']; ?>

                                                    </a>
                                                </li>
                                                <?php endfor; endif; ?>
                                            </ul>
                                        <?php endif; ?>

                                        <?php if ($this->_tpl_vars['listCategory'][$this->_sections['i']['index']]['id'] == '3'): ?> sub about
                                            <ul>
                                                <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['childAbout']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <li>
                                                    <a href="whatsUp.php?cid=<?php echo $this->_tpl_vars['childAbout'][$this->_sections['j']['index']]['id']; ?>
">
                                                        <?php echo $this->_tpl_vars['childAbout'][$this->_sections['j']['index']]['categoryName']; ?>

                                                    </a>
                                                </li>
                                                <?php endfor; endif; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endfor; endif; ?>
                                    -->
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li><a class="explore" href="#">&nbsp;
                                    <![if gt IE 6]>
                                </a>
                                <![endif]>
                                <!--[if lte IE 6]><table><tr><td><![endif]-->
                                <ul class="exploreMenu">

                                    <!--backup 25-03-2010-->
                                    <?php if ($this->_tpl_vars['explore']): ?>
                                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['explore']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <?php if ($this->_tpl_vars['explore'][$this->_sections['i']['index']]['id'] == 9): ?>
                                            <a href="tenant.php?floor=34"><?php echo $this->_tpl_vars['explore'][$this->_sections['i']['index']]['categoryName']; ?>
</a>
                                            <?php else: ?>
                                            <a href="tenant.php?pid=<?php echo $this->_tpl_vars['explore'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['explore'][$this->_sections['i']['index']]['categoryName']; ?>
</a>
                                            <?php endif; ?>
                                        <?php endfor; endif; ?>
                                    <?php endif; ?>
                                    <!--end-->
                                </ul>
                                <!--[if lte IE 6]></td></tr></table></a><![endif]-->
                            </li>
                            <li><a class="git" href="contact.php">&nbsp;</a></li>
                        </ul>
                    </div>
                    <!--end menu-->

                    <!-- content disinis -->
                    <?php echo $this->_tpl_vars['mainContent']; ?>

                    <!--end content -->
                    
                    <div class="footer">
                        <p class="copy">©2010 www.townsquare.co.id</p>
                    </div>
                </td>
                <td width="20" valign="top">
                    <img src="images/shd_right.gif" />
                </td>
            </tr>
        </table>
        <script type="text/javascript">
            <!--
            swfobject.registerObject("FlashID");
            swfobject.registerObject("FlashID2");
            //-->
        </script>

        <script type="text/javascript">
          <?php echo '
          var _gaq = _gaq || [];
          _gaq.push([\'_setAccount\', \'UA-867847-21\']);
          _gaq.push([\'_trackPageview\']);

          (function() {
            var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;
            ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';
            var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);
          })();
          '; ?>


        </script>
    </body>
</html>