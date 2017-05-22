<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$blog = new Blog();
		$blog->rs['Title'] = $_POST['Title'];
		$blog->rs['Post'] = $_POST['Post'];
		$blog->rs['UserId'] = $_SESSION['UserId'];
		$blog->create();
		
		header("Location:".myUrl('',true).'blog/admin/');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'blog/admin');
	}

}

?>