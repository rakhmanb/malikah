<?php

function _create()
{
	$user = new User();
	$user->rs['Username'] = $_POST['Username'];

	$user->rs['Email'] = $_POST['Email'];
	$user->rs['FirstName'] = $_POST['FirstName'];
	$user->rs['LastName'] = $_POST['LastName'];

	$passhash = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	$user->rs['Password'] = $passhash;

	$user->rs['Administrator'] = false;

	if($user->create())
	{
		header('Location:'.myUrl('',true)."user/success");
		exit();
	}
	else
	{
		header('Location:'.myUrl('',true)."user/signup");
		exit();
	}
}


?>
