<?php

function _logout()
{
	header("Location:".myUrl('logout-oidc.php',true));
}

?>
