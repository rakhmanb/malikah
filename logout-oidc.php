<?php

use Jumbojett\OpenIDConnectClient;

$domain = (getenv('DOMAIN') ? getenv('DOMAIN') : 'http://malikahatelier-test.com');
$auth_url = (getenv('AUTH_URL') ? getenv('AUTH_URL') : 'http://localhost:5000');

define('WEB_DOMAIN', $domain); //with http:// and NO trailing slash pls
define('AUTH_URL', $auth_url);


require( __DIR__ . '/vendor/autoload.php');

$oidc = new OpenIDConnectClient(AUTH_URL,
'php',
'malikah1gr8');

$cookie_name = "AccessToken";

$respTypes = array('code', 'id_token');

$oidc->setResponseTypes($respTypes);
$oidc->addScope("profile");
$oidc->addScope("openid");
$oidc->setRedirectURL(WEB_DOMAIN."/logout-oidc.php");
$oidc->addAuthParam(array('response_mode' => 'form_post'));
$oidc->authenticate();

$oidc->signOut( $_COOKIE[$cookie_name],WEB_DOMAIN."/signout-callback-oidc.php");

?>