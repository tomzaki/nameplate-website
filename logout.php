<?php

//code straight from php.net

// Initialize the session
session_start();

setcookie('logindata[username]', "", time() - 3600);
setcookie('logindata[series_id]', "", time() - 3600);
setcookie('logindata[token]', "", time() - 3600);

// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
header('Location: login.php'); 
exit; 
?>