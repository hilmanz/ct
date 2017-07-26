<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->

<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">

<html>
<head>
<link href="http://static.ak.fbcdn.net/connect.php/css/share-button-css" rel="stylesheet" type="text/css" />
<?php include("meta.php"); ?>
</head>

<body>
    <div id="fb-root"></div>
    <script>
        /* this comment used for running at localhost */
        (function() {
            var e = document.createElement('script');
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            e.async = true;
            document.getElementById('fb-root').appendChild(e);
        }());
        window.fbAsyncInit = function() {
            FB.init({
                appId    : '124311607719540',
                session : {},
                status   : true,
                cookie  : true,
                xfbml   : true
            });
        };

        $(document).ready(function(){
            var c = $.cookie("fbs_124311607719540");
            //alert("COOKIE"+c);
            $("#fb-root").everyTime(3000,function(i) {
                //alert("TIMEOUT");
                if(c == null){
                    //alert("C NULL");
                    //top.location.href="http://www.facebook.com/dialog/oauth?client_id=124311607719540&redirect_uri=http://apps.facebook.com/citoscontest/"
		}
            });
        });

    </script>



    <div id="maintab" class="container">
        <div id="flare2"></div>

        <!-- start nav -->
        <div id="navIndex">
            <?php $this->load->view('Frontend/contents/nav_header') ?>
        </div>
        <!-- end nav -->

        <a href="http://twitter.com/citosjakarta" target="_blank" class="twitter">&nbsp;</a>

        <?= $contents?>

    </div><!-- End Div Wrapper -->


</body>
</html>
