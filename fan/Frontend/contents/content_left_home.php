

<div class="monster">&nbsp;</div>

    <!--NEWS-->
    <div class="headline">
        <div class="img">
            <!--IMG SLIDESHOW CONTENT-->
            <div id="divContent">
                <table>
                    <tr>
                        <td>
                            <?
                                $n=0;
                                foreach($news_image->result() as $n_image){
                                    $n++
                            ?>
                            <div id="div<?= $n?>">
                                <a href="<?= base_url()?>index.php?req=view_news&p=detail_news&id=<?= $n_image->id?>">
                                <img src="<?= base_url()?>FILES/<?= $n_image->file?>" width="294" height="132" />
                                <span class="title"><?= $n_image->title?></span>
                                </a>
                            </div>
                            <?
                                }
                            ?>

                        </td>
                    </tr>
                </table>
            </div>
            <!--END-->

            <!--NAV IMG SLIDESHOW-->
            <div id="divTrigger">
                <?
                    $n=0;
                    foreach($news_image->result() as  $n_image){
                        $n++;
                ?>
                <a href="javascript:;" onClick="openContent(this,'div<?= $n?>')" <? if($n==1){?>id="firstSlide"<?}?>><?= $n?></a>
                <!--
                <a href="javascript:;" onClick="openContent(this,'div2')">2</a>
                -->
                <?
                    }
                ?>
            </div>
            <!--END-->
        </div>
        <div class="headlineContent">
            <h1 class="headlineTitle">Berita</h1>
            <ul class="list">
                <?
                    foreach($news->result() as $ns){
                ?>
                <li>
                    <a href="<?= base_url()?>index.php?req=view_news&p=detail_news&id=<?= $ns->id?>">
                        <?= $ns->title?>...<br>
                        <span style="font-size:11px;"><i><?= $ns->updated?></i>,
                        <font style="color:#630056;font-size:10px">
                            dikunjungi : <?= $page_click->getClickByLogName($ns->id, $log_name='NEWS')->row()->total_page_click_ln?> kali
                        </font>
                        </span>
                    </a>
                </li>
                <?
                    }
                ?>
            </ul>
        </div>
    </div>
    <!--END-->

    <!--ATM 
    <div class="headline">
        <div class="img">
            <img src="<?= base_url()?>FILES/<?= $atm_image?>" width="300px" height="180px" title="<?= $atm_title?>"/>
        </div>

        <div class="headlineContent">
            <ul class="list">
                <h1 class="headlineTitle">ATM 24 Jam</h1>
                <?
                    foreach($atm->result() as $a){
                ?>
                <li>
                    <a href="<?= base_url()?>index.php?req=view_articles&p=article_detail&c=<?= $a->idCat?>&a=<?= $a->idSubCat?>&id=<?= $a->id?>">
                        <?= $a->title?> ...<br> <span style="font-size:11px;"><i><?= $a->updated?></i>,
                        <font style="color:#630056;font-size:10px">
                            dikunjungi : <?= $page_click->getClickByPageID($a->id, $a->idCat)->row()->total_page_click?> kali
                        </font>
                        </span>
                    </a>
                </li>
                <?
                    }
                ?>
            </ul>
        </div>
    </div>
    END-->

<!--CULINER-->
<div class="headline">
    <div class="img">
        <img src="<?= base_url()?>FILES/<?= $culiner_image?>" title="<?= $culiner_title?>" width="300" height="180"/>
    </div>
    <div class="headlineContent">
        <h1 class="headlineTitle">Kuliner Indonesia</h1>
        <ul class="list">
            <?
                foreach($culiner->result() as $c){
            ?>
            <li>
                <a href="<?= base_url()?>index.php?req=view_articles&p=article_detail&c=<?= $c->idCat?>&a=<?= $c->idSubCat?>&id=<?= $c->id?>">
                    <?= $c->title?> ...<br> <span style="font-size:11px"><i><?= $c->updated?></i>,
                    <font style="color:#630056;font-size:10px">
                        dikunjungi : <?= $page_click->getClickByPageID($c->id, $c->idCat)->row()->total_page_click?> kali
                    </font>
                    </span>
                </a>
            </li>
            <?
                }
            ?>
            <!--
            <li><a href="#">Lorem ipsum dolor sit amet.sapienullamcorper ornare.</a></li>
            <li><a href="#">Consectetur adipiscing elit.sapien vel augue ullamcorper ornare.</a></li>
            <li><a href="#">Integer sollicitudin orci in odio semper.</a></li>
            -->
        </ul>
    </div>
</div>
<!--END-->

<!--BACKPACKER-->
<div class="headline">
    <div class="img">
        <img src="<?= base_url()?>FILES/<?= $backpacker_image?>" title="<?= $backpacker_title?>" width="300" height="180"/>
    </div>
    <div class="headlineContent">
        <h1 class="headlineTitle">Backpacker Indonesia</h1>
        <ul class="list">
            <?
                foreach($backpacker->result() as $b){
            ?>
            <li>
                <a href="<?= base_url()?>index.php?req=view_articles&p=article_detail&c=<?= $b->idCat?>&a=<?= $b->idSubCat?>&id=<?= $b->id?>">
                    <?= $b->title?> ...<br> <span style="font-size:11px"><i><?= $b->updated?></i>,
                    <font style="color:#630056;font-size:10px">
                        dikunjungi : <?= $page_click->getClickByPageID($b->id, $b->idCat)->row()->total_page_click?> kali
                    </font>
                    </span>
                </a>
            </li>
            <?
                }
            ?>
            <!--
            <li><a href="#">Lorem ipsum dolor sit amet.sapienullamcorper ornare.</a></li>
            <li><a href="#">Consectetur adipiscing elit.sapien vel augue ullamcorper ornare.</a></li>
            <li><a href="#">Integer sollicitudin orci in odio semper.</a></li>
            -->
        </ul>
    </div>
</div>
<!--END-->


