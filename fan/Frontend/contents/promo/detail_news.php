<?
    if($news_detail){
        if($news_detail->category=='PUBLIC'){

?>
    <h1>
        <strong><?= $news_detail->title?></strong>
    </h1>
    <span class="date">
        <i>update <?= $news_detail->updated?></i>,
        <font style="color:#630056;font-size:11px">
            dikunjungi : <?= $page_click->getClickByPageID($news_detail->id, '')->row()->total_page_click?> kali
        </font>
    </span>
    <p>
        <?= $news_detail->detail?>
    </p>
    <p>&nbsp;</p>
    <div class="share">
        <a class="twitter" href="http://twitter.com/home?status=<?= $r->title?>+@jendelainfo.com+http://jendelainfo.com/index.php?req=view_news&p=detail_news&id=<?= $news_detail->id?>" title="Click to share this post on Twitter" target="_blank" >&nbsp;</a>
        <a class="fb" href="http://www.facebook.com/sharer.php?u=http%3A%2F%2Fjendelainfo.com%2Findex.php?req=view_news&p=detail_news&id=<?= $news_detail->id?>" target="_blank">&nbsp;</a>
    </div>
<?
        }
    }else{

?>
<h1>
    <strong>Konten Sedang Di Perbaharui Atau Telah Di Hapus. Mohon Maaf Atas Ketidaknyamanan Anda.</strong>
</h1>
<p>&nbsp;</p>
<?
    }
?>


<?
    //LOAD COMMENT FORM
    $this->load->view('Frontend/contents/news/detail_news_comment');
?>
