    <script language="javascript">
        $(function(){
            $("#search").focus(function(){
                this.value = "";
            });
            $("#submit").click(function(){
                if($("#search").val() == "Cari Berdasarkan Nama...")
                    $("#search").val("");
            });
        });
    </script>

    <!-- not currently in use
    <div class="row">
        <form class="search" action="" method="post">
            <input type="text" name="search" id="search" value="Cari Berdasarkan Nama..." />
            <input type="submit" id="submit" value="CARI" />
        </form>
    </div>
     -->

<div id="gallery" class="wrapper">
    <div id="containerTab">
        <?
            foreach($photos->result() as $photo){
        ?>
        <div class="boxgrid captionfull">
        	<div class="boxgridEntry">
                <a href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>">
                    <img src="IMAGES_UPLOADED/<?= $photo->url ?>" />
                </a>
                <a class="cover boxcaption" href="<?= site_url()?>?req=view_photo&p=viewDetail&id=<?= $photo->id ?>">
                    <div class="entry">
                        <h3>
                            <?= $photo->name ?>
                        </h3>
                        <p class="totalVote">
                            <?= $photo->cnt_vote ?> VOTE(S)
                        </p>
                        <p class="testi">
                            <?= $photo->description ?>
                        </p>
                    </div><!-- end .entry -->
                </a><!-- end .cover -->
            </div><!-- end .boxgridEntry -->


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
            </div>
            -->

        </div><!-- end .boxgrid -->
        <?
            }
        ?>

        <?php //if(!$search): ?>
        <div id="paging" class="paging">
            <div id="page">
                <?= $paging ?>
                <!--
                <a href="#" class="prev">PREV</a>
                <a href="#">1</a>
                <a href="#">2</a>
                <a href="#" class="current">3</a>
                <a href="#">4</a>
                <a href="#">5</a>
                <a href="#">6</a>
                <a href="#">7</a>
                <a href="#">8</a>
                <a href="#">9</a>
                <a href="#" class="next">NEXT</a>
                -->
            </div><!-- end #page -->
        </div><!-- end #paging -->
        <?php //endif;?>
        
    </div><!-- end #containerTab -->
</div><!-- end #term -->

