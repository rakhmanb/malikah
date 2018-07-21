<?php

$domain = (getenv('DOMAIN') ? getenv('DOMAIN') : 'http://malikahatelier-test.com');
$auth_url = (getenv('AUTH_URL') ? getenv('AUTH_URL') : 'http://localhost:5000');

define('WEB_DOMAIN', $domain); //with http:// and NO trailing slash pls
define('AUTH_URL', $auth_url);

unset($_SESSION['Username']);
unset($_SESSION['UserId']);
unset($_SESSION['Email']);
unset($_SESSION['FName']);
unset($_SESSION['Administrator']);
unset($_SESSION['AccToken']);

if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    }
}

header("Location:".WEB_DOMAIN);

?>