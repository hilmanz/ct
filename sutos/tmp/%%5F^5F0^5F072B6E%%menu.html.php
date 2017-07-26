<?php /* Smarty version 2.6.13, created on 2011-11-22 14:42:38
         compiled from common/admin/menu.html */ ?>
<ul class="menu" id="menu">
    <li><a href="index.php">Dashboard</a>

       
        <ul>
            <li>
                <a href="?s=homepageSetting">Homepage Setting</a>
            </li>
        </ul>
        
        
        <!--
        <ul>
            <li><a href="#">Status (Active/Preview)</a></li>
            <li><a href="#">Last 10 Activities</a></li>
            <li><a href="#">Current Statistics</a></li>
            <li><a href="#">Link to Support</a></li>
        </ul>
        -->
    </li>

    <li><a href="?s=pages">Tenant</a>
        <ul>
            <li><a href="?s=pages&amp;r=new">New</a></li>
            <li><a href="?s=pages&amp;r=manageCategory">Manage Category</a></li>
        </ul>
    </li>

    <!--
    <li><a href="#">Web Pages</a>
        <ul>
            <li><a href="?s=homepageSetting">Manage Homepage </a>
                <ul>
                    
                    <li><a href="index.php?s=splash">Sections</a></li>
                    <li><a href="index.php?s=home">Main Object</a></li>
                    <li><a href="index.php?s=homepageSetting">Home Setting</a></li>
                    
                </ul>
            </li>
            
            <li><a href="index.php?s=page">Static Pages</a>
                <ul>
                    <li><a href="index.php?s=page">Manage Pages</a></li>
                    <li><a href="index.php?s=page&r=new">Create Page</a></li>
                    <li><a href="index.php?s=page&r=group">Groupings</a></li>
                </ul>
            </li>
            
            <ul>
                <li><a href="#">News</a></li>
                <li><a href="#">Events</a></li>
            </ul>
        </ul>
    </li>
    -->

    <li><a href="?s=article">What's Up</a>
        <ul>
            <li><a href="?s=article&r=new">New</a></li>
            <li><a href="?s=article&r=manageCategory">Manage Category</a></li>
            <li><a href="?s=article&r=whatsUpSetting">Whats Up Setting</a></li>
            <li><a href="?s=article&r=whatsUpSlideshow">Whats Up Slideshow Setting</a></li>
            
            <!--<li><a href="?s=article&r=group">Grouping</a></li>-->

            <!-- article menu 
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ARTICLE_MENU']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                <a href="?s=article&amp;groupID=<?php echo $this->_tpl_vars['ARTICLE_MENU'][$this->_sections['i']['index']]['groupID']; ?>
"><?php echo $this->_tpl_vars['ARTICLE_MENU'][$this->_sections['i']['index']]['groupName']; ?>
</a>
            </li>
            <?php endfor; endif; ?>
             end -->
        </ul>
    </li>
    <li><a href="?s=bannerSet">Banner Setting</a></li>
    <li><a href="index.php?s=gallery&r=viewFacebookImage">Facebook Image</a></li>
    <!--
    <li><a href="#">Application</a>
        <ul>
            <li><a href="index.php?s=testimony">Testimonials</a></li>
            <li><a href="index.php?s=careers">Careers</a></li>
            <li><a href="index.php?s=help">Knowledge Base</a></li>
            <li><a href="index.php?s=faq">FAQ</a></li>
            <li><a href="index.php?s=splash">Banners</a></li>

            <li><a href="index.php?s=customer">Customer Management</a></li>
            <li><a href="index.php?s=products">Product Management</a>
                <ul>
                    <li><a href="?s=products&r=addNew">Add New Product</a></li>
                    <li><a href="?s=categoryPhoto">View Category Photo</a></li>
                </ul>
            </li>
            <li><a href="#">Master File</a>
                <ul>
                    <li><a href="?s=productColor">Product Color</a></li>
                    <li><a href="#">Product Category</a>
                        <ul>
                            <li><a href="?s=productSize">View Product Size</a></li>
                            <li><a href="?s=category">View Category</a></li>
                            <li><a href="?s=subCategory">View Sub Category</a></li>
                            <li><a href="?s=typeCategory">View Type Category</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Shipping Fees</a>
                        <ul>
                            <li><a href="?s=shipment">Shipment</a></li>
                            <li><a href="?s=purchaseOrder">View Purchase Order</a></li>
                            <li><a href="?s=shipping">View Shipping</a></li>
                            <li><a href="?s=transactionHistory">View Transaction History</a></li>
                        </ul>
                    </li>
                    <li><a href="?s=country">Country</a></li>
                    <li><a href="?s=province">Province</a></li>
                    <li><a href="?s=city">City</a></li>
                </ul>
            </li>
            <li><a href="?s=exchangeRate&r=exchangeRate">Edit Exchange Rate</a></li>
            <li><a href="index.php?s=purchaseOrder">Orders</a></li>
            <li><a href="index.php?s=shipping">Shipping Management</a></li>
            <li><a href="index.php?s=promoText">Promo Text</a></li>

            <li><a href="index.php?s=download">File Management</a></li>
            <li><a href="#">Contact Management</a></li>
            <li><a href="#">Email Members</a></li>
        </ul>
    </li>
    -->

    <!--
    <li><a href="#">Gallery</a>
        <ul>
            <li><a href="index.php?s=gallery">Manage Images</a>
                <ul>
                    <li><a href="index.php?s=gallery&r=viewAlbum">View Album</a></li>
                    <li><a href="index.php?s=gallery&r=viewAddAlbum">Create Album</a>
                    <li><a href="index.php?s=gallery&r=addNew">Upload Image/Video</a></li>

                </ul>
            </li>
            <li><a href="index.php?s=gallery&r=viewFacebookImage">Facebook Image</a></li>
        </ul>
    </li>

    
    <li><a href="#">Members</a>
        <ul>
            <li><a href="index.php?s=member">Manage Members</a></li>
            <li><a href="#">Validated</a></li>
            <li><a href="#">Pending </a></li>
        </ul>
    </li>
    -->
    <li><a href="#">Share/Print</a>
        <ul>
            <li><a href="?s=print&r=manageClub">Club</a></li>
            <li><a href="?s=print&r=manageOffers">Offers</a></li>
        </ul>
    </li>
    <!--<li><a href="?s=statistic">Statistics</a></li>-->
    <li><a href="?s=admin&r=activities">Activity Log</a></li>
    
    <li><a href="?s=contact">Contact</a>
        <ul>
            <li><a href="?s=contact&r=newSubject">New Subject</a></li>
            <li><a href="?s=contact&r=newStaff">New Staff</a></li>
        </ul>
    </li>

    
    <!--<li><a href="index.php?s=splash">Banners</a></li>-->
    
    <!--<li><a href="#">Support</a></li>-->
</ul>
<br style="clear: left" />




