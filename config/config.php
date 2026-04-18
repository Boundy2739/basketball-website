<?php

// Detect if running on localhost (WAMP)
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    define('BASE_URL', 'http://localhost/basketballwebsite/');
} else {
    // InfinityFree 
    define('BASE_URL', 'https://hoop-avenue.infinityfree.me/');
}