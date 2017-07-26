
<div id="gallery" class="wrapper">
    <div id="containerTab">
         <?
           // print_r($photosWeekly);
        if($photosMonthly->num_rows >= 0)
            foreach($photosMonthly->result() as $photo){
        ?>
        <div class="boxgrid captionfull">
           
        	<div class="boxgridEntry">
                <a href="<?= $photo->fb ?>" target="_blank">
                    <img src="IMAGES_UPLOADED/<?= $photo->url ?>" />
                </a>
                <a class="cover boxcaption" href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>">
                    <div class="entry">
                        <h3><?= $photo->name ?></h3>
                        <p class="totalVote">
                            <?= $photo->cnt_vote ?> VOTE(S)
                        </p>
                        <p class="testi">
                            <?= $photo->description ?>
                        </p>
                    </div><!-- end .entry -->
                </a><!-- end .cover -->
            </div><!-- end .boxgridEntry -->
            
            <span class="label"></span>
        </div><!-- end .boxgrid -->
        <?
            }
        ?>

        <!--
        <div class="boxgrid captionfull">
        	<div class="boxgridEntry">
                <img src="sample/s_photo.jpg"/>
                <a class="cover boxcaption" href="index2.php?menu=galery-detail">
                    <div class="entry">
                        <h3>Soraya Harris</h3>
                        <p class="totalVote">15021 Votes</p>
                        <p class="testi">Saturday Nite Live seru banget.. nyesel klo ga dateeeng!!!</p>
                    </div>
                </a>
            </div>
            <span class="label"></span>
        </div>
        -->
        
        
    </div><!-- end #containerTab -->
</div><!-- end #term -->