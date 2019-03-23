<!DOCTYPE html>
<html lang="en">
<head>
<!-- use local jQuery if you prefer -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/converse.min.css">
<script src="builds/converse.min.js"></script>
<meta charset="utf-8" />
<title>15 minute update</title>
<meta name="description" content="" />
<meta name="author" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="robots" content="noindex, nofollow" />
<style>
button {
	width: 100px;
	height: 44px;
    display: none;
}
body{
    text-align: center;
}
#displayText{
    color:#A70202;
    font-size:25px;
}

</style>
</head>
<body>
    <h1>15 minute update</h1><hr>
    <p>So we do not forget sending updates every 15 minutes.</p>
    <p>More functionality to be added soon. This can be a good project!</p>

    <button id="my-button">Notify Me!</button>
    <div><p id="displayText">Next Update in </p><span id="time">01:00</span></div>


    <!-- <iframe src="https://chatstep.com/mobile.html#fifteenMinutes" width="700" height="350"></iframe> -->






    <!-- JavaScript assets -->


       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="time.js"></script>
    <script src="notify.js"></script>
    <script>

        jQuery(function ($) {
            var fiveMinutes = 60 * 15,
                display = $('#time');
            startTimer(fiveMinutes, display);
        });

        document.getElementById('my-button').addEventListener('click', function () {

            function onShowNotification () {
                console.log('notification is shown!');
            }

            function onCloseNotification () {
                console.log('notification is closed!');
            }

            function onClickNotification () {
                console.log('notification was clicked!');
            }

            function onErrorNotification () {
                console.error('Error showing notification. You may need to request permission.');
            }

            function onPermissionGranted () {
                console.log('Permission has been granted by the user');
                doNotification();
            }

            function onPermissionDenied () {
                console.warn('Permission has been denied by the user');
            }

            function doNotification () {
                var myNotification = new Notify('Hey!', {
                    body: '15 minute up. Update please?',
                    tag: 'My unique id',
                    notifyShow: onShowNotification,
                    notifyClose: onCloseNotification,
                    notifyClick: onClickNotification,
                    notifyError: onErrorNotification,
                    timeout: 10
                });

                myNotification.show();
            }

            if (!Notify.needsPermission) {
                doNotification();
            } else if (Notify.isSupported()) {
                Notify.requestPermission(onPermissionGranted, onPermissionDenied);
            }

        }, false);

 
    
    </script>
</body>


<script>
require(['converse'], function (converse) {
    converse.initialize({
        bosh_service_url: 'https://conversejs.org/http-bind/', // Please use this connection manager only for testing purposes
        i18n: locales.en, // Refer to ./locale/locales.js to see which locales are supported
        show_controlbox_by_default: true,
        play_sounds : true,
        roster_groups: true,
        show_controlbox_by_default: true,
            xhr_user_search: false
    });
});
</script>
</html>
