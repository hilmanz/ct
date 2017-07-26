<?php /* Smarty version 2.6.13, created on 2011-11-22 14:42:38
         compiled from common/admin/dashboard.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'common/admin/dashboard.html', 27, false),array('modifier', 'number_format', 'common/admin/dashboard.html', 81, false),)), $this); ?>

<div id="dashboardHead">
    <div id="webname">
        <h1>SURABAYA TOWNSQUARE</h1>
        <h2>www.townsquare.co.id</h2>
    </div>
    <!--  <div id="weblogo"> <a href="#"><img src="images/logoklien.gif" /></a> </div>-->
</div>



<div id="recentActivity">
    <table border="0" cellpadding="5" cellspacing="0" width="100%" class="list">
        <tbody>
            <tr>
                <td colspan="3"><h2> Recent Activity </h2><!--<a href="?s=admin&amp;r=activities">ALL ACTIVITES</a> --></td>
            </tr>
            <tr class="head">
                <td width="27%"><strong>Time<br>
                </strong></td>
                <td valign="top" width="56%"><strong>Activity</strong></td>
                <td valign="top" width="17%"><strong>Action By</strong></td>
            </tr>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['logs']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <td><?php echo $this->_tpl_vars['logs'][$this->_sections['i']['index']]['record_time']; ?>
</td>
                <td><a href="<?php echo $this->_tpl_vars['logs'][$this->_sections['i']['index']]['url']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['logs'][$this->_sections['i']['index']]['activity'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</a></td>
                <td><?php echo $this->_tpl_vars['logs'][$this->_sections['i']['index']]['username']; ?>
</td>
            </tr>
            <?php endfor; endif; ?>
        </tbody>
    </table>
    <div id="nextPage">
        <a href="?s=admin&r=activities"> See More</a>
    </div>
</div>


<div id="dashboardRight">
    <!-- sementara di off 25-03-2010, LINK
    <div id="statistic">
        <table class="list" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="2"><h2>Statistic</h2></td>
            </tr>
            <tr class="head">
                <td colspan="2">Your Web Statistic</td>
            </tr>
            
            <tr>
                <td>Total Pages</td>
                <td>24 pages</td>
            </tr>
            <tr>
                <td>Total Posts</td>
                <td>401 posts</td>
            </tr>
            <tr>
                <td>Most View Page</td>
                <td>...</td>
            </tr>
            
            <tr>
                <td><a href="index.php?s=products">Total Products</a></td>
                <td><?php echo $this->_tpl_vars['totalProduct']; ?>
</td>
            </tr>
            <tr>
                <td>Zero Stock Products</td>
                <td><?php echo $this->_tpl_vars['zeroStock']; ?>
</td>
            </tr>
            <tr>
                <td>Total Pending Payments</td>
                <td><?php echo $this->_tpl_vars['pendingPayments']; ?>
</td>
            </tr>
            <tr>
                <td>Total Pending Deliveries</td>
                <td><?php echo $this->_tpl_vars['pendingDelivery']; ?>
</td>
            </tr>
            <tr>
                <td>Total Paid This Month</td>
                <td>Rp. <?php echo ((is_array($_tmp=$this->_tpl_vars['paidThisMonth'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
            </tr>
            <tr>
                <td>Total Orders To Date</td>
                <td>Rp. <?php echo ((is_array($_tmp=$this->_tpl_vars['totalOrder'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
            </tr>
            
        </table>
    </div>
    
    
    <div id="iconDash">
        <a class="newArticleBig" href="?s=article">Create New Article</a>
        <a class="manageUser" href="?s=admin">Administrative Settings</a>
        <a class="showPages " href="?s=page">Show Pages</a>
        <a class="downloadManual" href="#">Download User Manual</a>
        <a class="contactSupport" href="#">Contact Support</a>
    </div>
    -->
</div>