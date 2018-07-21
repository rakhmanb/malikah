<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$blog = new Blog($_POST['Id']);
		$blog->rs['Title'] = $_POST['Title'];
		$blog->rs['Post'] = $_POST['Post'];
		$blog->rs['UserId'] = $_SESSION['UserId'];
		$blog->update();
		
		header("Location:".myUrl('',true).'blog/admin/');
	}
	else
	{
		header("Location:".myUrl('',true).'user/login/'.urlencode(myUrl('',true).'blog/admin'));
	}

}

?>