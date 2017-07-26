<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Coolant</title>
        <link href="css/coolant.css" rel="stylesheet" type="text/css" />
        <link href="http://static.ak.fbcdn.net/connect.php/css/share-button-css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery-1.3.2.js"></script>

    </head>

    <body>
        <script src="http://connect.facebook.net/en_US/all.js">
        </script>

        <div id="wrapper-home">
            <div class="content-home">
                <div id="nav">
                    <?php $this->load->view('Frontend/contents/nav_header') ?>
                </div><!-- End Div nav -->
                <br/>
                <div id="container">
                    <div class="content">
                        <div class="entry">
                            <?= $page->row()->description?>
                        </div> <!-- End Div Entry -->
                    </div><!-- End Div Content -->
                </div><!-- End Div container -->
            </div>
            <div id="footer">
                <p class="copy">&copy; 2011 Coolant </p>
            </div><!-- End Div footer -->
        </div><!-- End Div Wrapper -->
    </body>
</html>