<?php

use Jumbojett\OpenIDConnectClient;

$domain = (getenv('DOMAIN') ? getenv('DOMAIN') : 'http://malikahatelier-test.com');
$auth_url = (getenv('AUTH_URL') ? getenv('AUTH_URL') : 'http://localhost:5000');

define('WEB_DOMAIN', $domain);
define('AUTH_URL', $auth_url);

require( __DIR__ . '/vendor/autoload.php');

$retURL = "";

if(isset($_GET['returnUrl'])){
    $retURL = $_GET["returnUrl"];
    setcookie("returnURL", $retURL);
}

$oidc = new OpenIDConnectClient(AUTH_URL,
'php',
'malikah1gr8');


$respTypes = array('code', 'id_token');

$oidc->setResponseTypes($respTypes);
$oidc->addScope("profile");
$oidc->addScope("openid");
$oidc->setRedirectURL(WEB_DOMAIN."/login-oidc.php");
$oidc->addAuthParam(array('response_mode' => 'form_post'));

if(isset($_GET['prompt'])) {
    if($_GET['prompt'] == 'false'){
        $oidc->addAuthParam(array('prompt' => 'none'));
        setcookie("prompt", $_GET['prompt']);
    }
}
else{
    setcookie("prompt","true");
}

try {
    $oidc->authenticate();
    $email = $oidc->requestUserInfo('email');
    $userid = $oidc->requestUserInfo('user_id');
    $firstname = $oidc->requestUserInfo('given_name');
    $lastname = $oidc->requestUserInfo('family_name');
    $username = $oidc->requestUserInfo('name');

    $_SESSION['Username'] = $username;
    $_SESSION['UserId'] = $userid;
    $_SESSION['Email'] = $email;
    $_SESSION['FName'] = $firstname;
    $_SESSION['LName'] = $lastname;

    setcookie("AccessToken", $oidc->getIdToken());

    if($_COOKIE["prompt"] !== 'false') {
        header("Location: ".WEB_DOMAIN.$_COOKIE["returnURL"]);
        die();
    }

    ?>
        <script type="text/javascript">
            parent.postMessage("loggedin",'<?php echo WEB_DOMAIN; ?>');
        </script>
    <?php

}
catch(Exception $e) {
    echo "fail...";
    ?>
        <script type="text/javascript">
            parent.postMessage("Exception",'<?php echo WEB_DOMAIN; ?>');
        </script>
    <?php
}


?>