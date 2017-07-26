
<div id="fb-root"></div>
<script>
/*
    window.fbAsyncInit = function() {
        FB.init({
            appId   : '<?php echo $fb->getAPP_ID(); ?>',
            session : <?php echo json_encode($fb->session); ?>, // don't refetch the session when PHP already has it
            status  : true, // check login status
            cookie  : true, // enable cookies to allow the server to access the session
            xfbml   : true // parse XFBML
        });

        // whenever the user logs in, we refresh the page
        FB.Event.subscribe('auth.login', function() {
            window.location.reload();
        });
    };

    (function() {
        var e = document.createElement('script');
        e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
        e.async = true;
        document.getElementById('fb-root').appendChild(e);
    }());
*/

			(function() {
                var e = document.createElement('script');
                e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
                e.async = true;
                document.getElementById('fb-root').appendChild(e);
            }());
            window.fbAsyncInit = function() {
                FB.init({
                    appId    : '<?php echo $fb->getAPP_ID(); ?>',
                    session : {},
                    status   : true,
                    cookie  : true,
                    xfbml   : true
                });
            };
</script>

<?php
$user = $fb->getUserID();
echo $user;
echo $fb->getLoginLogoutUrl();
?>
