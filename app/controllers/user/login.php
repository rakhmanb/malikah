<?php

function _login()
{
	$type = '';
	$returnurl = '';

	if(isset($_POST['returnurl']))
	{
		$returnurl = $_POST['returnurl'];
	}

	if(isset($_POST['type']))
	{
		$type = $_POST['type'];
	}

	if(isset($type) && $type)
	{
		switch($type)
		{
			case "login":
			login();
			break;
		}
	}
	else
	{
		if(!isset($_SESSION['Username'] ))
		{
			$data['returnurl']=$returnurl;
			$data['body'][]=View::do_fetch(VIEW_PATH.'user/login.php', $data);
			View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
		}
		else
		{
			header("Location:".myUrl('',true));
		}
	}
}

function login()
{
	$user = new User();
	$newUser = $user->retrieve_one('Username = ?',$_POST['Username']);
	$passhash = password_hash($_POST['Password'], PASSWORD_DEFAULT);

	if($newUser)
	{

		if(password_verify($_POST['Password'],$newUser->rs['Password']))
		{
			$_SESSION['Username'] = $_POST['Username'];
			$_SESSION['UserId'] = $newUser->rs['Id'];
			$_SESSION['Email'] = $newUser->rs['Email'];
			$_SESSION['FName'] = $newUser->rs['Firstname'];
			$_SESSION['Administrator'] = $newUser->rs['Administrator'];

			if($_POST['returnurl'] && !empty($_POST['returnurl']))
			{
				header("Location:".urldecode($_POST['returnurl']));
			}
			else
			{
				header("Location:".myUrl('',true));
			}
		}
		else
		{
			header("Location:".myUrl('',true).'user/login');
		}
	}
}


?>
