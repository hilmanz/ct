<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include("meta.php"); ?>
</head>

<body>


    <div id="maintab" class="container">
        <div id="flare2"></div>

        <!-- start nav -->
        <div id="navIndex">
            <?php $this->load->view('Frontend/contents/nav_header') ?>
        </div>
        <!-- end nav -->

        <a href="http://twitter.com/citosjakarta" target="_blank" class="twitter">&nbsp;</a>

        <div class="wrapper">
            <?= $msg?><br><br>
            <?= $urlBack?>
        </div>
    </div><!-- End Div Wrapper -->
</body>
</html>
