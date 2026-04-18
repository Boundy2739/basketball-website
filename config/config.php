<?php

// Detect if running on localhost (WAMP)
if ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1') {
    define('BASE_URL', 'http://localhost/basketballwebsite/');
} else {
    // InfinityFree 
    define('BASE_URL', 'https://hoop-avenue.infinityfree.me/');
}

session_start();

if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else {
    $timer = 60 * 30;
    if (time() - $_SESSION['last_regeneration'] >= $timer) {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    };
}

/*Destroys session if someone tries to access from different device or with a different ip address */
if (isset($_SESSION['ip'], $_SESSION['user_agent'])) {
    if (
        $_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] ||
        $_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']
    ) {

        session_unset();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
}
$idleTimer = 90;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $idleTimer) {
    session_unset();
    session_destroy();
    header('Location: ../index.php');
    exit;
}



