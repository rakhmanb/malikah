<?php

function _create()
{
	$user = new User();
	$user->rs['Username'] = $_POST['Username'];

	$user->rs['Email'] = $_POST['Email'];
	$user->rs['Firstname'] = $_POST['FirstName'];
	$user->rs['Lastname'] = $_POST['LastName'];

	$passhash = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	$user->rs['Password'] = $passhash;

	$user->rs['Administrator'] = 0;

	$user->rs['Address'] = ' ';

	$user->rs['ExtraInfo'] = ' ';

	if($user->create())
	{
		header('Location:'.myUrl('',true)."user/login");
		exit();
	}
	else
	{
		header('Location:'.myUrl('',true)."user/signup");
		exit();
	}
}


?>
