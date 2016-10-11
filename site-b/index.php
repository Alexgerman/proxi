<?php

    function dump( $what = null ) {
        echo '<pre>' . print_r( $what, true ) . '</pre>';
    }

    echo '<p>I am a site B. Request variables:</p>';
    echo '<a href="http://proxi.zerp.info/site-b?somequery=somedata">Sample link. Click me!</a><br>';

    echo '_GET: <br>'; dump( $_GET );
    echo '_POST: <br>'; dump( $_POST );
    echo '_COOKIE: <br>'; dump( $_COOKIE );
    echo '_SERVER: <br>'; dump( $_SERVER );
