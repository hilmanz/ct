<h1><strong>INFO & BERITAKU</strong></h1>
<div>&nbsp;</div>
<?
    if($member_info->num_rows()>0){
        foreach($member_info->result() as $r){
            if($r->published=='1'){

?>
    <h1>
        <strong><?= $r->title?></strong>
    </h1>
    <span class="date"><i>update <?= $r->date_created?></i></span>
    <p>
        <?= $r->content?>
        <!--<font style="color:#630056;font-size:11px">
            dikunjungi : <?= $page_click->getClickByPageID($r->id, '', 'MEMBER_INFO')->row()->total_page_click?> kali
        </font>-->
    </p>
    <p>&nbsp;</p>

<?
            }
        }
?>

<p align="center"><?= $paging?></p>

<?
    }else if($r->published=='0'){
?>
<h1>
    <strong>Tidak ada berita atau info untuk anda hari ini</strong>
</h1>

<?
    }else{

?>
<h1>
    <strong>Tidak ada berita atau info untuk anda hari ini.</strong>
</h1>
<p>&nbsp;</p>
<?
    }
?>
