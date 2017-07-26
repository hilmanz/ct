<html>
    <head>
        <title>My Great Website</title>
    </head>
    <body>
        <div id="fb-root"></div>

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

<div id="share">
<fb:share-button class="meta">
<meta name="title" content="HyperArts"/>
<meta name="description" content="Read the Static FBML Bible and Rejoice!"/>
<link rel="image_src" href="http://www.hyperarts.com/facebook/static-fbml-bible/_img/share-img-100x150.gif"/>
<link rel="target_url" href="http://www.facebook.com/StaticFBMLBible"/>
</fb:share-button>
</div>

Read more: http://www.hyperarts.com/blog/facebook-fbml-fbshare-button-static-fbml-custom-image-default/#ixzz1O2tSKHrV

    </body>
</html>