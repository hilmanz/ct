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
            appId    : '124311607719540',
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
        alert("face");
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

<!--
<div class="row">
    <form class="search" action="<?= site_url()?>?req=view_photo&p=view" method="post">
        <input type="text" name="search" id="search" value="Cari Berdasarkan Nama..." />
        <input type="submit" id="submit" value="CARI" />
    </form>
</div>
-->


<!--
<div id="pagination">
    <div id="p1" class="_current" style="">
        

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
                
            </div>
            <a href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>" class="username"><?= $photo->name ?></a>
           
            
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
                        <input type="text" name="fb" />
                    </div>
                    <div class="row2">
					               <label>&nbsp;</label>
					               <span style="font-size: 10px; color: red">Contoh : http://www.facebook.com/IDKamu</span>
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

-->







<div id="gallery" class="wrapper">
    <div id="containerTab">
    	<div id="photoDetail">
        	<div class="w300">
                <div class="bigThumb">
                
                	<?
                		if($member->row()->fb){
                	?>
                	<a href="<?= $member->row()->fb?>" target="_BLANK">
                    		<img src="IMAGES_UPLOADED/<?= $photo->url ?>" />
                    	</a>
                    	<?
                    		}else{
                    	?>
                    		<img src="IMAGES_UPLOADED/<?= $photo->url ?>" />
                    	<?
                    		}
                    	?>
                </div>
                <div class="entryPhotoDetail">
                    <h3>
                    	<?
                		if($member->row()->fb){
                	?>
	                        <a href="<?= $member->row()->fb?>" target="_BLANK">
	                        	<?= $photo->name ?>
	                        </a>
                        <?
                    		}else{
                    	?>
                    		<?= $photo->name ?>
                    	<?
                    		}
                    	?>
                    </h3>
                    <p class="totalVote">
                        <?= $photo->cnt_vote ?> VOTE(S)
                    </p>
                    <p class="testi">
                        <?= $photo->description ?>
                    </p>
                    <a href="#vote" class="votes">&nbsp;</a>
                    <div class="tweet">
                    
                    
                   <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.facebook.com/townsquarecilandak/app_124311607719540" data-via="citosjakarta" data-hashtags="citosphotocompetition">Tweet</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                  	</div>
                    <div class="share">
                    
                    <!--
                    <fb:share-button href="http://www.townsquarephotocompetition.com/index.php?req=view_photo&p=viewDetail&id=<?=$photo->id?>" type="link"></fb:share-button> -->
                    
                    <fb:share-button href="http://www.facebook.com/townsquarecilandak/app_124311607719540" type="link"></fb:share-button>
					</div>

	
	
                    <!--<a href="#" class="share">&nbsp;</a>-->
                </div><!-- end .entry -->
            </div>
            <div class="w250">
            	<div id="komentar">
                    <h2>KOMENTAR</h2>
                     <div class="scrollbar scroll-pane wide1 tall1">
                        <div class="entry">
                        	
                            <?
                               foreach($comments->result() as $comment) {
                              
                            ?>
                            
                            <div class="row">
                                <!--
                            	<div class="smallThumb">
                                    <?= $comment->url ?>
                                	<a href="#">
                                        <img src="IMAGES_UPLOADED/<?= $comment->url ?>"/>
                                    </a>
                                </div>
                                -->
                                <h4>
                                    <a href="<?= $comment->fb ?>" target="_blank" style="text-decoration: none">
                                        <font color="orange">
                                        <b><?= $comment->name ?></b>
                                        </font>
                                    </a>
                                </h4>
                                <p>	
                                    <?= $comment->comment ?>
                                </p>
                            </div>  <!-- end .row -->
                            
                            
                            <?
                               }
                            ?>
                            
                        </div><!-- end .entry -->
                    </div><!-- end .scrollbar -->
                </div><!-- end #komentar -->
                <div id="vote">

                  
                    
                    <form action="<?= site_url()?>?req=view_photo&p=viewDetailSave" method="post">
                    <div class="row">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name"  onblur="if(this.value=='')this.value='Nama Lengkap';" onfocus="if(this.value=='Nama Lengkap')this.value='';" value="Nama Lengkap" />
                    </div><!-- end .row -->
                    <div class="row">
                        <label>No. Hp</label>
                        <input type="text" name="contact" onblur="if(this.value=='')this.value='62857XXXXXXX';" onfocus="if(this.value=='6285XXXXXXXX')this.value='';" value="62857XXXXXXX" />
                    </div><!-- end .row -->
                    <div class="row">
                        <label>Email</label>
                        <input type="text" name="email" onblur="if(this.value=='')this.value='you@yourmail.com';" onfocus="if(this.value=='you@yourmail.com')this.value='';" value="you@yourmail.com" />
                    </div><!-- end .row -->
                    <div class="row">
                        <label>Twitter ID</label>
                        <input type="text" name="twitter" onblur="if(this.value=='')this.value='@townsquare';" onfocus="if(this.value=='@townsquare')this.value='';" value="@townsquare" />
                    </div><!-- end .row -->
                    <div class="row">
                        <label>Komentar Kamu</label>
                        <textarea name="comment"></textarea>
                    </div><!-- end .row -->
                    <div class="rowSubmit">
                        <input type="hidden" name="id" value="<?= $photo->id ?>" />
                        <input type="hidden" name="memberid" value="<?= $photo->member_id ?>" />
                        <input type="submit" value="SUBMIT"  />
                    </div>
                    </form>
                    <button class="closeVotes" value="CANCEL">CANCEL</button>
                    </div>
                    
                </div>
            </div><!-- end .w250 -->
        </div><!-- end #photoDetail -->
    </div><!-- end #containerTab -->
</div><!-- end #term -->






