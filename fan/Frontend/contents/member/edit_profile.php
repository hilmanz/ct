<h1><strong>EDIT PROFIL MEMBER JEFO</strong></h1>
<div>&nbsp;</div>
<div>
    <form method="post" action="<?= base_url()?>index.php?req=users&p=edit_profile_save" enctype="multipart/form-data">
        <div class="row">
            Nama <input type="text" name="name" size="40" maxlength="40" value="<?= $member->name?>"/>
            <font color="red">wajib diisi. maksimal 40 karakter.</font>
        </div>
        <div class="row">
            Email <input type="text" name="email" size="40" value="<?= $member->email?>"/>
            <font color="red">wajib diisi. maksimal 40 karakter</font>
        </div>
        <div class="row">
            <select name="sex" id="sex">
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </select>
            <script>document.getElementById('sex').value="<?= $member->sex?>"</script>
        </div>
        <div class="row">No Telp <input type="text" name="contact" size="40" value="<?= $member->contact?>"/></div>
        <div class="row">Alamat <br><textarea name="address"><?= $member->address?></textarea></div>
        <div class="row">Yahoo Messenger <input type="text" name="ym" size="40" value="<?= $member->ym?>"/></div>
        <div class="row">Facebook <input type="text" name="fb" size="40" value="<?= $member->fb?>"/></div>
        <div class="row">Website <input type="text" name="website" size="40" value="<?= $member->website?>"/></div>
        <div class="row">
            Foto Lama<br>
            <img src="<?= base_url()?>IMAGES_UPLOADED/<?= $member->image?>" width="100"><br><br>
            Foto Baru <input type="file" name="foto">
        </div>
        
        <div class="row">
            <input type="submit" value="SAVE"><input type="reset" value="RESET">
            <input type="hidden" name="memberID" value="<?= $member->id?>">
        </div>
    </form>
</div>
