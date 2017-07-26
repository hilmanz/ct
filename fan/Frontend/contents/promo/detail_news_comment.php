<?
    if($news_detail){
?>

<?
    foreach($comments->getNewsComment($news_detail->id, $start, $limit)->result() as $r){

?>
<div class="comment">
    <p class="nama" style="font-size:18px;">
        <?= $r->name?>
        <?if($r->website){?>,
            <span style="font-size:12px;">
                <a href="<?= $r->website?>" style="color:#630056">website: <?= $r->website?></a>
            </span>
        <?}?>
    </p>
    <p style="color:#630056;font-size:11px;"><?= $r->date_created?></p>
    <p><?= $r->comment?></p>
</div>
<?
    }
?>

<p align="center">
    <?
        /*
         * SET PAGING
         */
        $this->load->library('pagination');
        $this->pagination = new CI_Pagination();
        //DEFINE PAGING HERE
        $config['base_url'] = '?req=view_news&p=detail_news&id='.$news_detail->id; //PAGING URL
        $config['total_rows'] = $comments->countNewsComment($news_detail->id)->row()->total_comment; //COUNT ROWS;
        $config['per_page'] = $limit; //SET LIMIT PER PAGE
        //$config['uri_segment'] = 3;
        $this->pagination->initialize($config); //PAGINATION CONFIG INITIALIZE
        if($config['total_rows']){print "Total Komentar : ".$config['total_rows']."<br>";}
        print $this->pagination->create_links(); //PAGINATION CREATE LINK
        //END
    ?>
</p>

<? if($this->pagination->create_links()){?>
<p>&nbsp;</p>
<? }?>
<div class="commentBox">
    <h1>Komentar Anda</h1>
    <form method="post" id="frm" action="<?= base_url()?>index.php?req=view_comments&p=save_news_comment" enctype="application/x-www-form-urlencoded">
        <div class="row"><input type="text" name="name" id="nm" value="Nama..."  onclick="resetName(this.value)"/></div>
        <div class="row"><input type="text" name="email" id="email" value="Email..." onclick="resetEmail(this.value)" /></div>
        <div class="row"><input type="text" name="website" id="website" value="Website..." onclick="resetWebsite(this.value)" /></div>
        <div class="row"><textarea name="comment" cols="45" rows="10" id="comment" onclick="resetComment(this.value)">Komentar Anda...</textarea></div>
        <div class="row">
            <input type="hidden" name="newsID" value="<?= $news_detail->id?>">
            <input type="submit" value="SIMPAN" id="bUpdate">
            <input type="reset" value="RESET">
        </div>
    </form>
</div>
<?
    }
?>
<script>
    function resetName(name){
        document.getElementById('nm').value="";
    }

    function resetEmail(email){
        document.getElementById('email').value="";
    }

    function resetWebsite(website){
        document.getElementById('website').value="";
    }

    function resetComment(comment){
        document.getElementById('comment').value="";
    }
</script>
