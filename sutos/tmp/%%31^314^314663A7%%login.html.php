<?php /* Smarty version 2.6.13, created on 2011-11-22 14:42:44
         compiled from common/admin/login.html */ ?>
<div id="login">
	<h1>KANA MANAGE LOGIN</h1>
  <form name="form1" method="post" action="login.php">
    <input type="hidden" name="PHPSESSID" value="85a1fe34897ffd340ee39272d8a03b8c" />
    <?php if ($this->_tpl_vars['msg'] <> ""): ?>
    <span class="messageLogin"> <?php echo $this->_tpl_vars['msg']; ?>
 </span>
    <?php endif; ?>
    <p>Username<br />
      <label>
      <input name="username" type="text" id="username" maxlength="20">
      </label>
      <br />
      <br />
      Password<br />
      <label>
      <input name="password" type="password" id="password" maxlength="20" />
      </label>
      <label>
      <input name="f" type="hidden" id="f" value="1">
      <input id="button" type="submit" name="Submit" value="Login" />
      </label>
    </p>
  </form>
</div>