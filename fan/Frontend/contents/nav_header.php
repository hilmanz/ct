<!-- sending request for invitation -->
<div id="fb-root"></div>
<script type='text/javascript'>

function isNumberKey(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode
 	if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;

 	return true;
}


function FbRequest(message, data){
	FB.ui({method:'apprequests',message:message,data:data,title:'Share this site with your friends'},
		function(response){
			// response.request_ids holds an array of user ids that received the request
		}
	);
}
// typical application initialization code for your site
(function() {
	var e = document.createElement('script');
	e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
	e.async = true;
	document.getElementById('fb-root').appendChild(e);
}());
window.fbAsyncInit = function() {
	FB.init({
		appId    : '124311607719540',
		session : {},
		status   : true,
		cookie  : true,
		xfbml   : true
	});
};


</script>


<?
//if(!$isActiveMember){
?>

<ul class="nav">
    <?
    //  if($isActiveMember){
    ?>
    <li><a href="<?= site_url()?>?req=view_photo&p=view">Photo Gallery</a></li>
    <li><a href="<?= site_url()?>?req=view_photo&p=viewBestPhoto">Best Photo</a></li>
    <li><a href="#" onclick="FbRequest('Send Request!','124311607719540');" class='vote'>Invite</a></li>
    <li><a href="<?= site_url()?>?req=view_members&p=register">Register</a></li>
    <li><a href="<?= site_url()?>?req=view_pages&p=info">Term &amp; Condition</a></li>

    <!--
    <li><a href="<?= site_url()?>?req=view_pages&p=info">Info Lomba</a></li>
    <li><a href="<?= site_url()?>?req=view_promo&p=viewAll">Coolant Promo</a></li>
    -->
    <?
    //}else{
    ?>
    <!--
    <li><a href="<?= site_url()?>?req=view_members&p=register">Daftar</a></li>
    <li><a href="#" onclick="FbRequest('Send Request!','4d5ada07acbbb0');">Invite</a></li>
    <li><a href="<?= site_url()?>?req=view_photo&p=view">Vote</a></li>
    -->
    <?
    //}
    ?>

</ul>
