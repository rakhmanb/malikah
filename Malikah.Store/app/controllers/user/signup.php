<?php

function _signup()
{
	//$data['body'][]=View::do_fetch(VIEW_PATH.'user/signup.php');
	//View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	header("location: ".AUTH_URL."/Account/Register");
}


?>