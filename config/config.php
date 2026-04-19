<?php

// Detect environment
$isLocal = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1');

// BASE URL (for links, CSS, images)
if ($isLocal) {
    define('BASE_URL', 'http://localhost/basketballwebsite/');
} else {
    define('BASE_URL', 'https://hoop-avenue.infinityfree.me/');
}

// BASE PATH (for require_once / includes)
define('BASE_PATH', dirname(__DIR__) . '/');

session_start();
require_once 'required-for-staff.php';


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
$idleTimer = 900;
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $idleTimer) {
    session_unset();
    session_destroy();
    $_SESSION['error'] = "Your session has expired";
    errorMessage($_SESSION['error'], '../staff-member-area/login_form.php');
}



