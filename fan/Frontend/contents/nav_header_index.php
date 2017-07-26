<a href="#" onclick="FbRequest('This page is amazing, check it out!','4d5da07acbbb0');">Send Request</a>

        <script type="text/javascript">
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
                    appId    : '197701666940959',
                    session : {},
                    status   : true,
                    cookie  : true,
                    xfbml   : true
                });
            };
        </script>

<ul>
    <li><a href="<?= site_url()?>?req=view_members&p=register">Daftar</a></li>
    <!--
    <li><a href="#" onclick="FbRequest('Send Request!','4d5da07acbbb0');">Invite</a></li>
    -->
    <li><a href="#" onclick="window.open('https://www.facebook.com/dialog/apprequests?api_key=197701666940959&app_id=197701666940959&data=4d5ada07acbbb0&display=popup&locale=en_US&message=Send%20Request!&next=http%3A%2F%2Fstatic.ak.fbcdn.net%2Fconnect%2Fxd_proxy.php%3Fversion%3D2%23cb%3Df1bcf63cc48339a%26origin%3Dhttp%253A%252F%252Fminumanantigerah.com%252Ff3501f80692a214%26relation%3Dopener%26transport%3Dpostmessage%26frame%3Df2a1d64a833d9da%26result%3D%2522xxRESULTTOKENxx%2522&sdk=joey&title=Share%20this%20site%20with%20your%20friends')">Invite</a></li>
    
    <li><a href="<?= site_url()?>?req=view_photo&p=view">Vote</a></li>
</ul>
