<div>
    <font style="color:red;font-size:22px">
        404 PAGE NOT FOUND!
    </font>
    <hr><font size=2>Coolant &copy 2011 All Right Reserved.</font>
    <br><br><br><br>

    <font color="red">
    If your javascript enabled, you will automatically redirect in few second. Thank you.
    </font>
    <br>
    <a href="<?= base_url()?>" style='text-decoration:none; color:green'>
        [ Click Here. If your javascript disabled ]
    </a>
    <script>
        function Redirect(){
          location.href = '<?= base_url()?>';//dont hack my page. redirect to index.
        }

        setTimeout('Redirect()',1500);
    </script>
</div>