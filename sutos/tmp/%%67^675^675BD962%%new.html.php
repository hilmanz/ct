<?php /* Smarty version 2.6.13, created on 2011-08-09 11:10:59
         compiled from Tenant/admin/new.html */ ?>
<?php echo '
<script type="text/javascript" src="jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
    tinyMCE.init({
        // General options
        mode : "exact",
        elements : "detail",
        theme : "advanced",
        plugins : "safari,pagebreak,style,table,advhr,advimage,SimpleBrowser,advlink,inlinepopups,preview,media,searchreplace,print,contextmenu,paste,fullscreen,noneditable,visualchars,nonbreaking,template",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,SimpleBrowser,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,media,advhr,|,fullscreen",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        theme_advanced_resizing : true,

        // Example content CSS (should be your site CSS)
        content_css : "css/content.css",

        // Drop lists for link/image/media/template dialogs
        template_external_list_url : "lists/template_list.js",
        external_link_list_url : "lists/link_list.js",
        external_image_list_url : "lists/image_list.js",
        media_external_list_url : "lists/media_list.js",
        paste_insert_word_content_callback : "convertWord"



    });
    function convertWord(type, content) {
        switch (type) {
            // Gets executed before the built in logic performes it\'s cleanups
            case "before":
                // do nothing
                break;

            // Gets executed after the built in logic performes it\'s cleanups
        case "after":
            content = content.replace(/<(!--)([\\s\\S]*)(--)>/gi, "");
            break;
    }

    return content;
}
</script>

<script>
function makeTwoChars(inp) {
    return String(inp).length < 2 ? "0" + inp : inp;
}

function initialiseInputs() {
    // Clear any old values from the inputs (that might be cached by the browser after a page reload)
    document.getElementById("article_date").value = "";
    // Add the onchange event handler to the start date input
    datePickerController.addEvent(document.getElementById("article_date"), "change", setDates);
}

var initAttempts = 0;
function setDates(e) {
    // Internet Explorer will not have created the datePickers yet so we poll the datePickerController Object using a setTimeout
    // until they become available (a maximum of ten times in case something has gone horribly wrong)

    try {
        var sd = datePickerController.getDatePicker("article_date");
    } catch (err) {
        if(initAttempts++ < 10) setTimeout("setDates()", 50);
        return;
    }

    // Check the value of the input is a date of the correct format

}
function removeInputEvents() {
    // Remove the onchange event handler set within the function initialiseInputs
    datePickerController.removeEvent(document.getElementById("article_date"), "change", setDates);
}
datePickerController.addEvent(window, \'load\', initialiseInputs);
datePickerController.addEvent(window, \'unload\', removeInputEvents);

//]]>
</script>

<script>
function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}
</script>
'; ?>

<table class="addlist">
    <tr class="head">
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=pages">Tenant</a> - Create Tenant</td>
    </tr>
    <tr>
        <td height="34"><p><strong>TENANT</strong> - 
                        <strong>CREATE TENANT</strong></p></td>
    </tr>
    <tr>
        <td>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table class="addlist">
                                <tr>
                                    <td><strong>Title</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input name="title" type="text" id="title" size="50" />
                                        <strong><br /></strong>
                                    </td>
                                </tr>
                                <!--
                                <tr>
                                <td bgcolor="#e5e5e5"><strong>Date</strong></td>
                                </tr>
                                <tr>
                                <td bgcolor="#e5e5e5"><input name="isArticleDate" type="radio" id="radio" value="1" checked="checked" onclick="document.getElementById('article_date').disabled=false;document.getElementById('custom_date').disabled=true;document.getElementById('custom_date').value=''"/>
                                <input name="article_date" type="text" id="article_date" value="<?php echo $this->_tpl_vars['rs']['article_date']; ?>
" size="15" maxlength="30" class="w8em format-d-m-y highlight-days-67 divider-dash">
                                <br />


                                </a>click the icon to choose the date.<br/><input type="radio" name="isArticleDate" id="radio" value="2" onclick="document.getElementById('article_date').disabled=true;document.getElementById('custom_date').disabled=false;document.getElementById('article_date').value=''"/>
                                Custom Date :
                                <input type="text" name="custom_date" id="custom_date" />
                                <script>document.getElementById('custom_date').disabled=true;</script>
                                <br />
                                example : 13 - 15 juni 2009</td>
                                </tr>
                                -->

                                <tr>
                                    <td><strong>Category</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="categoryID" id="categoryID">
                                            <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['group']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                            <option value="<?php echo $this->_tpl_vars['group'][$this->_sections['j']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['group'][$this->_sections['j']['index']]['categoryName']; ?>
</option>
                                            <?php endfor; endif; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Brief Summary</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="brief" id="brief" cols="50" rows="5" maxlength="100" onkeyup="return ismaxlength(this)"></textarea>
                                        <p style="color:red">
                                            Max : 100 character
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Detail</strong></td>
                                </tr>
                                <tr>
                                    <td><textarea name="detail" id="detail" cols="50" rows="20"></textarea>
                                        <br />
                                        <font color="red">
                                        WARNING : do not ever copy/paste from Microsoft Word directly !
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Banner Image </strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="file" name="banner" id="banner" />
                                        <font color="red">
                                            Image size : 961px X 291px
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Tenant Logo</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="file" name="file" id="file" />
                                        <font color="red">
                                            Image size : 170px X 115px
                                        </font>
                                        <br />
                                    </td>
                                </tr>

                                <!--
                                <tr>
                                    <td><strong>Attachment</strong></td>
                                </tr>
                                <tr>
                                    <td><input type="file" name="attachment" id="attachment" />
                                        <br />
                                        Allowed file size : 2 MB (Megabytes) maximum.
                                    </td>
                                </tr>
                                -->
                                
                                <tr>
                                    <td>
                                        <input name="s" type="hidden" id="s" value="pages" />
                                        <input name="r" type="hidden" id="r" value="add" />
                                        <input type="submit" name="button" id="button" value="ADD ARTICLE" />
                                    </td>
                                </tr>
                            </table><br />
                        </form>
        </td>
    </tr>
</table>