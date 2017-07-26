<?
$photo = $photos->row();
?>

        <div id="fb-root"></div>

        <script type="text/javascript">
            function FbRequest(message, data){
                FB.ui({method:'apprequests',message:message,data:data,title:'Share this site with your friends'},
                    function(response){
                        // response.request_ids holds an array of user ids that received the request
                    }
                );
            }
            // typical application initialization code for your site
            (function() {
                var e = document.createElement('script');
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());
            window.fbAsyncInit = function() {
                FB.init({
                    appId    : '149418585130563',
                    session : {},
                    status   : true,
                    cookie  : true,
                    xfbml   : true
                });
            };
        </script>


<link href="js/facebox/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="js/facebox/facebox.js" type="text/javascript"></script>
<script type='text/javascript'>
    $(function() {
        $('a[rel*=facebox]').facebox({
            loadingImage : 'js/facebox/loading.gif',
            closeImage   : 'js/facebox/closelabel.png'
        })

        $("#search").focus(function(){
            this.value = "";
        });
        $("#submit").click(function(){
            if($("#search").val() == "Cari Berdasarkan Nama...")
                $("#search").val("");
        });
    });
</script>

<div class="row">
    <form class="search" action="<?= site_url()?>?req=view_photo&p=view" method="post">
        <input type="text" name="search" id="search" value="Cari Berdasarkan Nama..." />
        <input type="submit" id="submit" value="CARI" />
    </form>
</div>
<div id="pagination">
    <div id="p1" class="_current" style="">
        <div class="foto-detail">
            <img src="IMAGES_UPLOADED/<?= $photo->url ?>" />
        </div>

        <!--Facebook Send button Start -->
        <!--
        <b:if cond='data:blog.pageType != &quot;static_page&quot;'>
        <div style='float:left;padding:5px 5px 5px 0;'>
        <script src='http://connect.facebook.net/en_US/all.js#xfbml=1' type='text/javascript'></script><fb:send expr:href='data:post.url' font='' colorscheme='light'></fb:send>
        </div>
        </b:if>
        -->
        <!--Facebook Send button End -->





        <br/><br/>
        <div class="text-detail">
            <div class="votebox">
                <fb:share-button class="meta">
					<meta name="medium" content="mult"/>
					<meta name="title" content="Coolant - Minuman Anti Gerah & Panas"/>
					<meta name="description" content="Lomba Foto COOLANT"/>
					<link rel="image_src" class='vote' href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>" />
					<link rel="target_url" class='vote' href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>"/>
				</fb:share-button>
                <a href="#comment_form" rel="facebox" class='vote' title='Vote'>Vote</a>
                <a href="#" onclick="FbRequest('Coolant','4d5da07acbbb0');" class='vote'>Invite</a>
                <!--
                <a name="fb_share" type="button_count" href="http://www.facebook.com/sharer.php">Share</a><script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
                -->
                <!--
                <a style="text-decoration: none;" share_url="#" href="#" name="fb_share" type="button_count">
                    <span class="fb_share_size_Small ">
                        <span class="FBConnectButton FBConnectButton_Small" style="cursor: pointer;">
                            <span class="FBConnectButton_Text">Share</span>
                        </span>
                    </span>
                </a>
                -->
            </div>
            <a href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>" class="username"><?= $photo->name ?></a>
            <!--<div class="address">
                <span><?//= $photo->address ?></span>
            </div>-->
            <div class="rate">
                <img src="images/coolant/star.jpg" />
                <img src="images/coolant/star.jpg" />
                <img src="images/coolant/star.jpg" />
                <!--<img src="images/coolant/star.jpg" />
                <img src="images/coolant/star.jpg" />-->
            </div>
            <div class="total-vote">
                <span><?= $photo->cnt_vote ?> VOTE(S)</span>
            </div>
            <div class="testi">
                <span><?= $photo->description ?></span>
            </div>
        </div>

        <div>
            <div id="comment_form" style='display: none; padding: 15px;'>
                <form action="" method="post">
                    <? if($isActiveMember) { ?>
                    <div class="row2">
                        <label>Nama :</label>
                        <input type="text" readonly="readonly" value="<?= $activeMember->row()->name ?>" />
                    </div>
                    <div class="row2">
                        <label>Email :</label>
                        <input type="text" readonly="readonly" value="<?= $activeMember->row()->email ?>" />
                    </div>
                    <div class="row2">
                        <label>ID Facebook :</label>
                        <input type="text" readonly="readonly" value="<?= $activeMember->row()->fb ?>" />
                    </div>
                    <div class="row2">
                        <label>No.Tlp/Hp :</label>
                        <input type="text" readonly="readonly" value="<?= $activeMember->row()->contact ?>" />
                    </div>
                        <? }else { ?>
                    <div class="row2">
                        <label>Nama :</label>
                        <input type="text" name="name" />
                    </div>
                    <div class="row2">
                        <label>Email :</label>
                        <input type="text" name="email" />
                    </div>
                    <div class="row2">
                        <label>ID Facebook :</label>
                        <input type="text" name="fb" value="http://www.facebook.com/IDKamu" />
                    </div>
                    <div class="row2">
                        <label>No.Tlp/Hp :</label>
                        <input type="text" name="contact" />
                    </div>
                        <? } ?>

                    <h2>Komentar</h2>
                    <input type="hidden" name="id" value="<?= $photo->id ?>" />
                    <input type="hidden" name="memberid" value="<?= $photo->member_id ?>" />

                    <textarea name="comment" cols="10" rows="4" >
                    </textarea>
                    <br/>
                    <input type="submit" value="Submit" />
                </form>
            </div>

            <h2>Komentar</h2>
            <?
            foreach($comments->result() as $comment) {
                ?>
            <div>
                <a href="<?= $comment->fb ?>" target="_blank" style="text-decoration: none"> <font color='orange'> <b> <?= $comment->name ?> <b> </font> </a>
                <!--<a href="<?= $comment->fb ?>" target="_blank"> lihat profil facebook </a>-->
                <br/><br/>
                    <?= $comment->comment ?>
            </div> <br/><br/>
                <?
            }
            ?>
        </div>
    </div><!-- End Div p1 -->
</div> <!-- End Div pagination -->








