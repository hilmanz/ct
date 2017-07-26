<div id="pagination">
    <div id="p1" class="_current" style="">
        <h1>Coolant Promo</h1>

        <?
            foreach($promo->result() as $r){
        ?>
        <div class="row">
            <div>
                <h3><?= $r->title?></h3>
                <div class="promo-text">
                    <span>
                        <?= $r->detail?>
                    </span>
                </div>
            </div>
        </div><!-- End Div Row -->
        <?
            }
        ?>
    </div><!-- End Div p1 -->
</div> <!-- End Div pagination -->