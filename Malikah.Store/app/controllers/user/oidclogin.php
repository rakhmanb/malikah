<?php
use Jumbojett\OpenIDConnectClient;

function _oidclogin(){

global $oidc;

    $oidc->setRedirectURL("http://localhost/user/oidclogin");
    $oidc->setResponseTypes(array('id_token'));
    $oidc->addScope(array('openid'));
    $oidc->addAuthParam(array('response_mode' => 'form_post'));
    $oidc->authenticate();
    $sub = $oidc->getVerifiedClaims('sub');


$name = $oidc->requestUserInfo('given_name');
$email = $oidc->requestUserInfo('email');
$userid = $oidc->requestUserInfo('user_id');
$username = $oidc->requestUserInfo('name');

$_SESSION['Username'] = $username;
$_SESSION['UserId'] = $userid;
$_SESSION['Email'] = $email;
$_SESSION['FName'] = $name;


}