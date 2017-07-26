<h1><strong>EDIT AKUN MEMBER JEFO</strong></h1>
<div>&nbsp;</div>
<div>
    <form method="post" action="<?= base_url()?>index.php?req=users&p=edit_account_save" enctype="url-encode">
        <div class="row">
            Username <input type="text" name="username" size="40" maxlength="10" value="<?= $member->username?>"/>
            <font color="red">wajib diisi. maksimal 10 karakter</font>
        </div>
        <div class="row">
            Password Lama <input type="password" name="oldPassword" size="40" maxlength="10"/>
            <font color="red">wajib diisi. maksimal 10 karakter</font>
        </div>
        <div class="row">
            Password Baru <input type="password" name="newPassword" size="40" maxlength="10"/>
            <font color="red">wajib diisi. maksimal 10 karakter</font>
        </div>
        <div class="row">
            <input type="submit" value="SAVE"><input type="reset" value="RESET">
            <input type="hidden" name="memberID" value="<?= $member->id?>">
        </div>
    </form>
</div>
