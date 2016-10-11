<?php

define('EOL', '<br>');

$url_a = 'http://proxi.zerp.info/site-a';
$url_b = 'http://proxi.zerp.info/site-b';

echo ' Site A' . EOL;

function dump($what = null) {
    echo '<pre>' . print_r($what, true) . '</pre>' . EOL;
}

function replace_url($content, $search, $replace) {
    return str_replace($search, $replace, $content);
}

$request_url = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

echo ' Origin to: ' . $request_url . EOL;
$request_url = replace_url($request_url, $url_a, $url_b);
echo ' Proxi to: ' . $request_url . EOL;

$options = array(
    'http' => array(
        'method' => $_SERVER['REQUEST_METHOD'],
        'header' => "User-Agent: " . $_SERVER['HTTP_USER_AGENT']
    )
);

$context = stream_context_create($options);
$response = file_get_contents($request_url, false, $context);

echo 'Modified site B output:' . EOL;
echo replace_url($response, $url_b, $url_a ) . EOL;

echo 'End demo' . EOL;
