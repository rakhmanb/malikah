<?php

function _logout()
{
	//clear session related to user object
	unset($_SESSION['Username']);
	unset($_SESSION['UserId']);
	unset($_SESSION['Email']);
	unset($_SESSION['FName']);
	unset($_SESSION['Administrator']);

	header("Location:".myUrl('',true));
}

?>
