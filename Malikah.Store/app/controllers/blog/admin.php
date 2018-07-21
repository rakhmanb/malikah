<?php

function _admin()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$blog = new Blog();
		$arr = $blog->retrieve_many('UserId = ?', $_SESSION['UserId']);
	
		$data['blogposts'][] = $arr;
		$data['body'][]=View::do_fetch(VIEW_PATH.'blog/admin.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'blog/admin');
	}

}

?>