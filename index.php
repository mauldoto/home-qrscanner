<?php

if( !session_id() ) session_start();

require_once 'app/init.php';

//echo "BASEURL saat ini: " . BASEURL;
//echo "BASEURL saat ini: " . $currentIP;

$app = new App;
