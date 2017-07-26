<html>
    <head>
        <?php include("meta.php"); ?>
    </head>
    <body>
    	<script>
			$(document).ready(function(){
				jQuery(".showPemenang").click(function(){
					jQuery("#welcome").fadeOut();
					jQuery("#pemenang").fadeIn();
					return false;
				});
			});
		</script>
    	<div style="width:800px; height:1000px; position:relative;">
            <div class="container" id="welcome">
                <a href="#pemenang" class="showPemenang"><img src="images/pemenang.jpg"></a>
            </div><!-- end #like -->
            <div class="container" id="pemenang" style="display:none; position:absolute;">
                <img src="images/daftarpemenang.jpg">
            </div><!-- end #like -->
        </div>
    </body>
</html>