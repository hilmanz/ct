<?php /* Smarty version 2.6.13, created on 2010-03-17 12:15:06
         compiled from FRONTEND/content.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'FRONTEND/content.html', 57, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Picnic Shop,Online Fashion Shopping Indonesia,Tops,Dresses,Skirts,Outerwear,Blazers </title>

<meta name="MSSmartTagsPreventParsing" content="TRUE" />
<meta name="robots" content="noarchive" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="-1" />
<?php if ($this->_tpl_vars['PRODUCT_TITLE']): ?>
<meta name="description" content="<?php echo $this->_tpl_vars['PRODUCT_TITLE']; ?>
" />
<?php else: ?>
<meta name="description" content="Online Fashion Shop Jakarta Indonesia" />
<?php endif; ?>
<meta name="keywords" content="Picnic, Online Shopping,Shopping, Fashion, Tops,Dresses,Skirts,Outerwear,Blazers,Jackets,Leggings,Tights,Pants,Shorts,Jeans,Shoes,Bags,Purses,Accessories<?php if ($this->_tpl_vars['CUSTOM_TAGS']): ?>,<?php echo $this->_tpl_vars['CUSTOM_TAGS'];  endif; ?>" />
<meta name="author" content="Kanadigital" />

<link href="css/picnic.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tree.css" />
<script type="text/javascript" src="js/treemenu.js"></script>
<script type="text/javascript" src="js/iepngfix_tilebg.js"></script>
<script src="js/typeface-0.13.js"></script>
<script src="js/bouganssi_regular.typeface.js"></script>

<!--zoom set component-->
    <link href="css/cssZoomImages/productDetails.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="Scripts/zoomImages/multiproductskuselector.js"></script>
    <script type="text/javascript" language="javascript" src="Scripts/zoomImages/magnify.js"></script>
<!--end zoom set component-->

<!-- js slideshow -->
<script language="javascript" src="js/images-slideshow/jquery.js"></script>
<link href="css/imagesSlideshow/style.css" rel="stylesheet" type="text/css">
<script language="javascript" src="js/images-slideshow/showSlideshow.js"></script>
<!-- end js slideshow -->

<!-- verticalMenuScroller component -->
<link rel="stylesheet" type="text/css" href="css/verticalMenuScroller/verticalMenuScroller.css" />
<script src="Scripts/verticalMenuScroller/jquery.js" type="text/javascript"></script>
<script src="Scripts/verticalMenuScroller/verticalMenuScroller.js" type="text/javascript"></script>
<!-- end verticalMenuScroller component -->


<!-- js zebraTable -->
<script type="text/javascript" src="js/table.js"></script>
</head>

<body onload="init()">
	<div id="shdTop"></div>
	<div class="body typeface-js">
    	<div id="header">
        	<div id="headerlogo">
                <div ><a class="logo" href="index.php">&nbsp;</a></div>
                <div class="shoppingcart">
                    <a class="cart" href="product.php?do=cart"> Shopping cart </a> <span class="cartItem"><?php echo ((is_array($_tmp=$this->_tpl_vars['TOTAL_ITEMS'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 items</span>
                </div>
            </div>
            <div id="headerTopNav">
                <div class="topNav typeface-js">
                    <ul>
                        <?php if ($this->_tpl_vars['isLogin']): ?>
                        <li><a href="customer.php">my account</a></li>
                        <?php else: ?>
                        <li><a href="customer.php?check=loginPage">Login/Register</a></li>
                        <?php endif; ?>
                        <li><a href="home.php?page=contact">contact us</a></li>
                        <li><a href="home.php?page=how-to-buy">how to buy</a></li>
                        <?php if ($this->_tpl_vars['isLogin']): ?>
                        <li><a href="customer.php?check=logout">Logout</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div id="headerNavigasi">
            <div class="navigasi typeface-js">
                <ul>
                    <?php if ($this->_tpl_vars['MENU1']): ?><li><a href="product.php?page=just_in">just in</a></li><?php endif; ?>
                    <?php if ($this->_tpl_vars['MENU2']): ?><li><a href="product.php?page=women">women</a></li><?php endif; ?>
                    <?php if ($this->_tpl_vars['MENU3']): ?><li><a href="product.php?page=men">men</a></li><?php endif; ?>
                    <?php if ($this->_tpl_vars['MENU4']): ?><li><a href="product.php?page=interior">interior</a></li><?php endif; ?>
                    <li><a href="trends.php">trends</a></li>
                     <?php if ($this->_tpl_vars['MENU5']): ?><li><a href="product.php?page=on_sale">on sale</a></li><?php endif; ?>
                </ul>
            </div>
            <form method="get" action="search.php">
            <div class="search">
                <input class="search" type="text" name="searchText" />
                <button class="searchBtn" type="submit" value="search">search</button>
            </div>
            </form>
        </div>
        <div id="container">
            <?php echo $this->_tpl_vars['mainContent']; ?>

        </div>
        <div class="footer typeface-js">
        	<ul>
            	<li><a href="home.php?page=terms-of-use">terms of use </a></li>
                <li><a href="home.php?page=privacy-policy">privacy policy</a></li>
            </ul>
            <div class="copyright">
                <span class="copy">© 2009 www.shop-picnic.com </span>
                <div class="copySide">&nbsp;</div>
            </div>
        </div>
    </div>
    <div id="shdBot"></div>

     <script type="text/javascript">
            <?php echo '
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
            '; ?>

        </script>

        <script type="text/javascript">
            <?php echo '
            try {
                var pageTracker = _gat._getTracker("UA-867847-19");
                pageTracker._trackPageview();
            } catch(err) {}

            '; ?>

        </script>

</body>
</html>