<?php /* Smarty version 2.6.13, created on 2011-10-20 16:51:55
         compiled from Article/admin/edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'stripslashes', 'Article/admin/edit.html', 112, false),)), $this); ?>
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
<script language="JavaScript" type="text/javascript" src="jscripts/js-date/calendar.js"></script>

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
        <td height="34"><a href="index.php">Dashboard</a> - <a href="?s=article">Article</a> - Edit Article</td>
    </tr>
        <tr>
        <td height="34"><p><strong>ARTICLE</strong>&nbsp; &raquo;&nbsp;
                        <strong>EDIT ARTICLE</strong></p></td>
    </tr>
    <tr>
        <td valign="top">
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                            <table width="100%" border="0" cellspacing="0" cellpadding="5" class="addlist">
                                <tr>
                                    <td><strong>Title</strong></td>
                                </tr>
                                <tr>
                                    <td><input name="title" type="text" id="title" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['rs']['title'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
" size="50" /></td>
                                </tr>
                                <!--
                                <tr>
                                    <td bgcolor="#e5e5e5"><strong>Date</strong></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#e5e5e5"><input name="isArticleDate" type="radio" id="radio" value="1" onclick="document.getElementById('article_date').disabled=false;document.getElementById('custom_date').disabled=true;document.getElementById('custom_date').value=''"/>
                                        <input name="article_date" type="text" id="article_date" value="<?php echo $this->_tpl_vars['rs']['article_date']; ?>
" size="15" maxlength="30" class="w8em format-d-m-y highlight-days-67 divider-dash">
                                        click the icon to choose the date.<br/><input name="isArticleDate" type="radio" id="radio" onclick="document.getElementById('article_date').disabled=true;document.getElementById('custom_date').disabled=false;document.getElementById('article_date').value=''" value="2" checked="checked"/>
                                        Current Date :
                                        <input name="custom_date" type="text" id="custom_date" value="<?php echo $this->_tpl_vars['rs']['article_date']; ?>
" />

                                        <br />
                                    example : 13 - 15 juni 2009  <script>document.getElementById('article_date').disabled=true;</script></td>
                                </tr>
                                <tr>
                                    <td><strong>Category</strong></td>
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
                                        <script>document.getElementById('categoryID').value = '<?php echo $this->_tpl_vars['rs']['categoryID']; ?>
';</script>
                                    </td>
                                </tr>


                                
                                <tr>
                                    <td>
                                        <strong>Month Events</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="events" id="events">
                                            <option value="0">- Select Month -</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        <script>document.getElementById('events').value = '<?php echo $this->_tpl_vars['rs']['events']; ?>
';</script>
                                    </td>
                                </tr>
                                
                                
                                <tr>
                                    <td><strong>Brief Summary</strong></td>
                                </tr>
                                <tr>
                                    <td><textarea name="brief" id="brief" cols="50" rows="5" maxlength="100" onkeyup="return ismaxlength(this)"><?php echo ((is_array($_tmp=$this->_tpl_vars['rs']['brief'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea></td>
                                </tr>
                                <tr>
                                    <td><strong>Detail</strong></td>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="detail" id="detail" cols="50" rows="20"><?php echo ((is_array($_tmp=$this->_tpl_vars['rs']['detail'])) ? $this->_run_mod_handler('stripslashes', true, $_tmp) : stripslashes($_tmp)); ?>
</textarea>
                                        <br />
                                        <font color="red">
                                        WARNING : do not ever copy/paste from Microsoft Word directly !
                                        </font>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Banner Image</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <img src="../contents/article/<?php echo $this->_tpl_vars['rs']['bannerImg']; ?>
" /><br /><br>
                                        <strong>Upload New Banner Image </strong><br>
                                        <input type="file" name="banner" id="banner" />
                                        <font color="red">
                                            Image size : 961px X 291px
                                        </font>
                                        <!--Allowed size : 300 x 247 pixels, Jpeg Format only.-->
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Headline  Image</strong>
                                    </td>
                                </tr>

                                <?php if ($this->_tpl_vars['categoryID'] == '4' || $this->_tpl_vars['categoryID'] == '5'): ?> <!--clubs & offers-->
                                    <tr class="head">
                                        <td><strong>1. Click and Select Image Area where you want to tag</strong></td>
                                    </tr>
                                    <tr>
                                        <td height="126" valign="top">
                                            <div style="position:relative; padding-top:10px;">
                                                <img src="../contents/article/<?php echo $this->_tpl_vars['photoTagged']; ?>
" name="imageid" border="0" class="annotated" id="imageid" /><br />
                                                <!--localsetting<img src="../../public_html/contents/static/<?php echo $this->_tpl_vars['img']; ?>
" name="imageid" border="0" class="annotated" id="imageid" /><br />-->
                                                <br />

                                                <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                <!-- making selection area -->
                                                <style type='text/css'>

                                                    #map a.<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>

                                                    <?php echo '
                                                    {
                                                        '; ?>


                                                        top:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['y1']; ?>
px;
                                                        left:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['x1']; ?>
px;
                                                        width:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['width']; ?>
px;
                                                        height:<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['height']; ?>
px;

                                                        <?php echo '
                                                    }
                                                    '; ?>

                                                </style>
                                                <!-- tag result element -->
                                                <ul id="map">
                                                    <li> <a class="<?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
" href="#"> <span> <b><?php echo $this->_tpl_vars['list'][$this->_sections['i']['index']]['title']; ?>
</b> </span> </a> </li>
                                                </ul>
                                                <?php endfor; endif; ?>
                                                <p><strong>In this photo (click to remove tag):</strong></p>
                                                <ul style="list-style:none; margin:0; padding:0;">
                                                    <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['list']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                    <li style="float:left; margin:15px 15px 20px 0; padding:0;">
                                                        <a href="?s=article&r=removeTag&id=<?php echo $this->_tpl_vars['list'][$this->_sections['j']['index']]['id']; ?>
&cid=<?php echo $this->_tpl_vars['list'][$this->_sections['j']['index']]['categoryID']; ?>
"
                                                        onclick="return confirm('Are you sure want to delete tag : <?php echo $this->_tpl_vars['list'][$this->_sections['j']['index']]['title']; ?>
 ?')"><?php echo $this->_tpl_vars['list'][$this->_sections['j']['index']]['title']; ?>
</a>
                                                    </li>
                                                    <?php endfor; endif; ?>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="head">
                                        <td ><strong>2. Start typing a name for your tag</strong></td>
                                    </tr>
                                    <tr>
                                        <td height="126" valign="top">
                                            <div>
                                                <form method="post">
                                                    <div>
                                                        <!-- Grab the X/Y/Width/Height -->
                                                        <table>
                                                            <tr align="center">
                                                                <td>x1</td>
                                                                <td>y1</td>
                                                                <td>x2</td>
                                                                <td>y2</td>
                                                                <td>width</td>
                                                                <td>height</td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" name="x1" id="x1" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['x1']; ?>
" size="4"/>                </td>
                                                                <td><input type="text" name="y1" id="y1" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['y1']; ?>
" size="4"/>                </td>
                                                                <td><input type="text" name="x2" id="x2" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['x2']; ?>
" size="4"/>                </td>
                                                                <td><input type="text" name="y2" id="y2" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['y2']; ?>
" size="4"/>                </td>
                                                                <td><input type="text" name="w" id="w" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['width']; ?>
" size="4"/>                </td>
                                                                <td><input type="text" name="h" id="h" value="<?php echo $this->_tpl_vars['list'][$this->_sections['k']['index']]['height']; ?>
" size="4"/>                </td>
                                                            </tr>
                                                        </table>
                                                        <input type="text" name="typingText" size="30" value="Typing words..." id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
                                                        
                                                        
                                                        <select name="url">
                                                            <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dropdownDescription']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                                                            <option value="<?php echo $this->_tpl_vars['dropdownDescription'][$this->_sections['j']['index']]['description']; ?>
">
                                                                <?php echo $this->_tpl_vars['dropdownDescription'][$this->_sections['j']['index']]['description']; ?>

                                                            </option>
                                                            <?php endfor; endif; ?>
                                                        </select>

                                                        <!--
                                                        <input type="text" name="url" size="30" value="Insert url.." id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
                                                        -->
                                                        
                                                        <input id="button" type="submit" value="Tagged"/>
                                                    </div>
                                                    <!--  Auto complete drop down  -->
                                                    <div class="suggestionsBox" id="suggestions" style="display: none;"> <img src="images/tagsPhoto/upArrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                                                        <div class="suggestionList" id="autoSuggestionsList"> </div>
                                                    </div>
                                                    <div class="clear"></div>
                                                    <div>&nbsp;</div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Upload New Headline Image </strong><br>
                                            <input type="file" name="file" id="file" />
                                            <!--Allowed size : 300 x 247 pixels, Jpeg Format only.-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="s" type="hidden" id="s" value="article" />
                                            <input name="r" type="hidden" id="r" value="addImageTags" />
                                            <input name="id" type="hidden" id="id" value="<?php echo $this->_tpl_vars['rs']['id']; ?>
" />
                                            <input type="submit" name="button" id="button" value="UPDATE ARTICLE" />
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <tr>
                                        <td>
                                            <img src="../contents/article/<?php echo $this->_tpl_vars['rs']['img']; ?>
" /><br /><br>
                                            <strong>Upload new Image </strong><br>
                                            <input type="file" name="file" id="file" />
                                            <font color="red">
                                                Image size : 394px X 94px
                                            </font>
                                            <!--Allowed size : 300 x 247 pixels, Jpeg Format only.-->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="s" type="hidden" id="s" value="article" />
                                            <input name="r" type="hidden" id="r" value="update" />
                                            <input name="id" type="hidden" id="id" value="<?php echo $this->_tpl_vars['rs']['id']; ?>
" />
                                            <input type="submit" name="button" id="button" value="UPDATE ARTICLE" />
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <!--
                                <tr>
                                    <td>
                                        <strong>Attachment : </strong>
                                        <?php if ($this->_tpl_vars['rs']['attachment']): ?>
                                        <a href="#"><?php echo $this->_tpl_vars['rs']['attachment']; ?>
</a> &nbsp;&nbsp;
                                        <a href="?s=article&amp;r=delete_attachment&amp;id=<?php echo $this->_tpl_vars['rs']['id']; ?>
">
                                            Delete
                                        </a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="file" name="attachment" id="attachment" />
                                        <br />
                                        Allowed file size : 2 MB (Megabytes) maximum.
                                    </td>
                                </tr>
                                -->
                                
                                
                            </table><br />
                        </form>
        </td>
    </tr>
</table>