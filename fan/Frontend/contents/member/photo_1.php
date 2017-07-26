<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({appId: '197701666940959', status: true, cookie: true,
            xfbml: true});
    };
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
</script>

<?php
// Get these from http://developers.facebook.com
$api_key = 'a38b509be19f32fd0c866e367580c4ef';
$secret  = '92fc730cb9576297fa76df3520fed1fa';

include_once './facebook.php';
//echo '/facebook_api/facebook.php';

$facebook = new Facebook($api_key, $secret);

$user = $facebook->require_login();

//$albums = $facebook->api_client->fql_query("SELECT location, link FROM album where owner = $user");
?>

<!--
<fb:name uid="<?= $user ?>" useyou="false">
-->

    <div>
        <?php
        $friends = $facebook->api_client->friends_get();
        ?>

        <ul>
            <?
            foreach($friends as $friend) {
                echo "<li><fb:profile-pic uid=\"$friend\" linked=\"true\" /> <fb:name uid=\"$friend\" useyou=\"false\"></li>";
            }
            ?>
        </ul>
    </div>


    <div class="row">
        <form class="search">
            <input type="text" value="Cari Berdasarkan Nama..." />
            <input type="button" value="CARI" />
        </form>
    </div>
    <div id="pagination">
        <div id="p1" class="_current" style="">
            <div class="row">
                <div class="thumb">
                    <a href="foto-detail.html"><img src="images/coolant/foto.jpg" /></a>
                </div>
                <div class="text">
                    <a href="<?= site_url()?>?req=view_photo&p=viewDetail" class="username">Soraya Harris</a>
                    <div class="rate">
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                    </div>
                    <div class="total-vote">
                        <span>1234190 VOTES</span>
                    </div>
                    <div class="testi">
                        <span>"Badan Seger Seketika!!!!! kok Bisa??
                            Coolent Gitu lohhh"</span>
                    </div>
                </div>
            </div><!-- End Div Row -->
            <div class="row">
                <div class="thumb">
                    <a href="foto-detail.html"><img src="images/coolant/foto.jpg" /></a>
                </div>
                <div class="text">
                    <a href="foto-detail.html" class="username">Soraya Harris</a>
                    <div class="rate">
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                    </div>
                    <div class="total-vote">
                        <span>1234190 VOTES</span>
                    </div>
                    <div class="testi">
                        <span>"Badan Seger Seketika!!!!! kok Bisa??
                            Coolent Gitu lohhh"</span>
                    </div>
                </div>
            </div><!-- End Div Row -->
            <div class="row">
                <div class="thumb">
                    <a href="foto-detail.html"><img src="images/coolant/foto.jpg" /></a>
                </div>
                <div class="text">
                    <a href="foto-detail.html" class="username">Soraya Harris</a>
                    <div class="rate">
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                    </div>
                    <div class="total-vote">
                        <span>1234190 VOTES</span>
                    </div>
                    <div class="testi">
                        <span>"Badan Seger Seketika!!!!! kok Bisa??
                            Coolent Gitu lohhh"</span>
                    </div>
                </div>
            </div><!-- End Div Row -->
            <div class="row">
                <div class="thumb">
                    <a href="foto-detail.html"><img src="images/coolant/foto.jpg" /></a>
                </div>
                <div class="text">
                    <a href="foto-detail.html" class="username">Soraya Harris</a>
                    <div class="rate">
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                    </div>
                    <div class="total-vote">
                        <span>1234190 VOTES</span>
                    </div>
                    <div class="testi">
                        <span>"Badan Seger Seketika!!!!! kok Bisa??
                            Coolent Gitu lohhh"</span>
                    </div>
                </div>
            </div><!-- End Div Row -->
            <div class="row">
                <div class="thumb">
                    <a href="foto-detail.html"><img src="images/coolant/foto.jpg" /></a>
                </div>
                <div class="text">
                    <a href="foto-detail.html" class="username">Soraya Harris</a>
                    <div class="rate">
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                        <img src="images/coolant/star.jpg" />
                    </div>
                    <div class="total-vote">
                        <span>1234190 VOTES</span>
                    </div>
                    <div class="testi">
                        <span>"Badan Seger Seketika!!!!! kok Bisa??
                            Coolent Gitu lohhh"</span>
                    </div>
                </div>
            </div><!-- End Div Row -->
        </div><!-- End Div p1 -->

        <div id="paging" class="paging">
            <div id="page">
                <a href="#" class="prev">PREV</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#" class="next">NEXT</a>
            </div>
        </div>
    </div> <!-- End Div pagination -->