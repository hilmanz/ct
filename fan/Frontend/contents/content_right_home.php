
<!--RIGHT BANNER SET-->
<!--
<script>
    flashembed("sidebanner", "flash_banner/300x250.swf");
</script>
-->
<div class="sidebanner" id="sidebanner">
    <img src="BANNER_FILES/<?= $banners->getBannerById(2)->row()->file?>"> <!--RIGHT BANNER 1-->
</div>

<!--
<script>
    flashembed("sidebanner2", "flash_banner/300x250.swf");
</script>
-->
<div class="sidebanner2" id="sidebanner2">
    <img src="BANNER_FILES/<?= $banners->getBannerById(3)->row()->file?>"> <!--RIGHT BANNER 2-->
</div>
<!--END BANNER SET-->


<p style="padding:250px"></p>
<div>
    <table border="0" cellpadding="1" cellspacing="0" width="100%">
        <tr><td colspan="3"><h1 class="headlineTitle">Jumlah Member JEFO : <?= $totalMember?></h1></td></tr>
        <tr><td colspan="3"><h1 class="headlineTitle">Member Terbaru JEFO</h1></td></tr>
        <?
            foreach($jefo_member->result() as $r){
        ?>
        <tr bgcolor="white">
            <td width="700">
                <ul>
                    <li>
                        <a href="">
                        <?= $r->name?> <i>(<?= $r->sex?>)</i><br>
                        <span style="font-size:10px">Terdaftar pada <?= $r->registered?></span>
                        </a>
                    </li>
                </ul>
            </td>
            <td width="200" align="center">
                <a href="">
                <? if($r->image){?>
                <img src="IMAGES_UPLOADED/<?= $r->image?>" height="30">
                <? }else{?>
                <img src="images/member.jpg" height="30">
                <?}?>
                </a>
            </td>
        </tr>

        <?
            }
        ?>


        <!--
        <tr><td>&nbsp;</td></tr>
        <?
            if($forum_member->num_rows()>0){
        ?>
        <tr><td colspan="3"><h1 class="headlineTitle">Member - Forum Jendela Info</h1></td></tr>
        <?
            }
        ?>

        <?
            foreach($forum_member->result() as $fm){
        ?>
        <tr bgcolor="white">
            <td width="200">
                <ul>
                    <li>
                        <a href="">
                            <?= $fm->memberName?> <i></i>
                        </a>
                        <br>
                        <span style="font-size:10px">
                            <? if($fm->websiteUrl!=""){ ?>
                            <a href="<?= $fm->websiteUrl?>" target="_BLANK">
                            Website : <?= $fm->websiteUrl?>
                            </a>
                            <? }else{?>
                            tidak terdefinisi
                            <?}?>
                        </span>
                        <br>
                        <span style="font-size:10px">
                            <? if($fm->YIM!=""){?>
                            <a href="">
                            YM : <?= $fm->YIM?>
                            </a>
                            <? }else{?>
                            tidak terdefinisi
                            <?}?>
                        </span>
                    </li>
                </ul>
            </td>
            <td width="200" align="center">
                <? if($fm->location){?>
                <a href="">
                <?= $fm->location?>
                </a>
                <? }else{?>
                lokasi tidak terdefinisi
                <?}?>
            </td>
        </tr>
        <?
            }
        ?>
        -->
    </table>
</div>