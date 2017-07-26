<div class="monster2">&nbsp;</div>
<ul class="list">
    <div align="center" style="background-color:#EFEFEF">
    <h1>
        <strong>
        <font size="3">
            <?
                if($SHOW_TITLE_IN_LEFT==TRUE){
            ?>
                Artikel Lainnya
            <?
                }else{
            ?>
                Wilayah
            <?
                }
            ?>
        </font>
        </strong>
    </h1>

    </div>
    <?
        if($category){
            foreach($category->result() as $r){
    ?>
    <li>
        <strong>
            <a href="<?= base_url()?>index.php?req=view_articles&p=article_detail&c=<?= $c?>&a=<?= $r->idSubCat?><? if($SHOW_TITLE_IN_LEFT==TRUE){?>&id=<?= $r->id?><?}?>">
            <?
                if($SHOW_TITLE_IN_LEFT==TRUE){
                    print $r->title;
                    
                }else{
                    print $r->categoryName;
                }
            ?>
            </a>
        </strong>
    </li>
    <?
            }
        }
    ?>

</ul>