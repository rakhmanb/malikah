<?php

function _addblog()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$data['body'][]=View::do_fetch(VIEW_PATH.'blog/addblog.php');
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'blog/admin');
	}

}

?>