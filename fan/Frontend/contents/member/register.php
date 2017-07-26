<!-- sending request for invitation -->
<?php
   

    
    //use for local only, make a random fb user_id
    $rand = rand(0, 100);
    
//    $fb_user = $facebook->require_login(); //redirect to FB apps domain id
//    if($fb_user!=null){
//        $user = $facebook->api_client->users_getInfo($fb_user,'uid');
//    }else{
//        $user = null;
//    }
    
    $user = $fbuid;
    //$user=$rand;
    
    $fburl = $fbprofile;


?>

<style type="text/css">
.vote{
	float: right;
}
</style>


<br>

<div id="register" class="wrapper">
    <div id="containerTab">
        <form class="registration" method="post" action="<?= site_url()?>?req=view_members&p=registerSave" enctype="multipart/form-data">
            <input type="hidden" name="fb_id" value="<?= $user ?>" />
            <input type="hidden" name="fburl" value="<?= $fburl?>"/>
            <div class="w250">
                <div class="row">
                    <label>Nama Lengkap</label>
                    <input type="text" name="name"  onblur="if(this.value=='')this.value='Nama Lengkap';" onfocus="if(this.value=='Nama Lengkap')this.value='';" value="Nama Lengkap" />
                </div><!-- end .row -->
                <div class="row">
                    <label>No. KTP/Kartu Pelajar</label>
                    <input type="text" name="noid" onblur="if(this.value=='')this.value='21XXXXXXXXXXXXXX';" onfocus="if(this.value=='21XXXXXXXXXXXXXX')this.value='';" value="21XXXXXXXXXXXXXX" />
                </div><!-- end .row -->
                <div class="row">
                    <label>No. Hp</label>
                    <input type="text" name="contact" onblur="if(this.value=='')this.value='08XXXXXXXXXX';" onfocus="if(this.value=='08XXXXXXXXXX')this.value='';" value="08XXXXXXXXXX" />
                </div><!-- end .row -->
                <div class="row">
                    <label>Alamat Lengkap</label>
                    <textarea name="address"></textarea>
                </div><!-- end .row -->
            </div>
        	<div class="w250">
                <div class="row">
                    <label>Email</label>
                    <input type="text" name="email" onblur="if(this.value=='')this.value='you@yourmail.com';" onfocus="if(this.value=='you@yourmail.com')this.value='';" value="you@yourmail.com" />
                </div><!-- end .row -->
                <div class="row">
                    <label>Twitter ID</label>
                    <input type="text" name="tid" onblur="if(this.value=='')this.value='@townsquare';" onfocus="if(this.value=='@townsquare')this.value='';" value="@townsquare" />
                </div><!-- end .row -->
                <div class="row">
                    <label>Upload Foto Kamu (800 X 600 Pixel)</label>
                    <input type="file" name="photo" />
                </div><!-- end .row -->
                <div class="row">
                    <label>Judul Foto</label>
                    <textarea name="comment"></textarea>
                </div><!-- end .row -->
            </div>
            <div class="row rowCheckbox">
                <input type="checkbox"/>
                <label><i>Dengan ini saya menyatakan setuju terhadap semua <a href="<?= site_url()?>?req=view_pages&p=info">persyaratan dan ketentuan</a> yang berlaku untuk mengikuti program ini.</i></label>
            </div><!-- end .rowCheckbox -->
            <div class="rowSubmit">
                <input type="submit" value="DAFTAR"  />
            </div>
            <!--
                <div class="errorMessage">Nama dan nomor telpon kamu belum diisi, Alamat kamu belum diisi.</div>
            -->
        </form>
    </div><!-- end #containerTab -->
</div><!-- end #term -->



<!--
<div class="row">
        <label>Facebook ID</label>
        <input type="text" name="fid" value="http://www.facebook.com/facebookKamu" /> <font color="red">wajib</font>
    </div>
    
    <div class="row">
        <label>Testimonial</label>
        <textarea name="comment"></textarea> <font color="red">wajib</font>
    </div>
    -->
    