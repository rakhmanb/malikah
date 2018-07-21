<?php


function _login()
{
	$retURL = "";
	if(isset($_POST['returnurl'])) {
		$retURL = $_POST['returnurl'];
	}
	header("Location:".myUrl('login-oidc.php?returnUrl='.$retURL,true));
}


?>
