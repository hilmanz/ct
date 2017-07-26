<?php /* Smarty version 2.6.13, created on 2011-12-12 14:40:30
         compiled from FRONTEND/contents/contact.html */ ?>


<?php echo '
<script type="text/javascript">
function alertselected(selectobj){
    var x = document.getElementById("subject").value;
 //alert(x)
 return x;
}
</script>
'; ?>

<div class="banner">
    <img src="contents/banners/<?php echo $this->_tpl_vars['banner']['file']; ?>
" />
</div>
<div class="wrapper">
    <h1 class="titlepage pageNav"><a class="blue4" href="?index=git">Get In Touch</a></h1>
    <div class="content">

        <div class="w400L" style="display:table;">
            <img src="images/git_img.jpg" />
            <p style="padding-left:20px"><strong>PT GRAHA MEGARIA SURABAYA</strong><br />
                Townsquare Surabaya 2nd Floor<br />
                Jl. Adityawarman No.55<br />
                Surabaya - 60242<br />
                Telephone : (62-31) 561 0222 <br />
            Fax : (62-31) 653 0202</p>

        </div>

    
        <div class="w400R">
            <form action="contact.php?do=send" method="post" class="formpage">
                <div class="row">
                    <label for="textinput">Name:</label>
                    <input type="text" id="name" name="name" size="30" />
                </div>
                <div class="row">
                    <label for="textinput">Phone:</label>
                    <input type="text" id="phone" name="phone" size="30" />
                </div>
                <div class="row">
                    <label for="textinput">Email:</label>
                    <input name="email" type="text" id="email" size="30" />
                </div>
                <div class="row">
                    <label for="textareainput">Address:</label>
                    <textarea id="address" name="address" rows="2" cols="30"></textarea>
                </div>
                <div class="row">
                    <label class="choose" for="textinput">Subject:</label>
                    <select size="1" id="subject" name="subject" onChange="alertselected(this)">
                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['category']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['category'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['category'][$this->_sections['i']['index']]['subject']; ?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                </div>
                <!--
                <div class="row">
                    <label class="choose" for="textinput">Send To</label>
                    <select size="1" id="staff" name="staff" onchange="alertselected(this)">
                        <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['staff']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
                        <option value="<?php echo $this->_tpl_vars['staff'][$this->_sections['j']['index']]['id']; ?>
" selected><?php echo $this->_tpl_vars['staff'][$this->_sections['j']['index']]['staff_name']; ?>
</option>
                        <?php endfor; endif; ?>
                    </select>
                </div>
                -->
                <div class="row">
                    <label for="textareainput">Comments:</label>
                    <textarea id="message" name="message" rows="2" cols="30"></textarea>
                </div>

                <?php if ($this->_tpl_vars['msg']): ?>
                <div class="row" align="center">
                    <label for="textareainput">&nbsp;</label>
                    <font style="color:red"><?php echo $this->_tpl_vars['msg']; ?>
</font>
                </div>
                <?php endif; ?>
                
                <div class="row">
                    <input type="submit" value="Submit" class="submitContact" />
                </div>
            </form>
        </div>

    </div>
    <hr class="clear" />
</div>

<?php echo '
<script>
    function getStaff(param){
        var staff = document.getElementById("staff").value;
        alert(staff);
    }
</script>
'; ?>