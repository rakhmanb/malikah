<?php

function _delete($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$blog = new Blog($id);
		$blog->delete();
		
		header("Location:".myUrl('',true).'blog/admin/');
	}
	else
	{
		header("Location:".myUrl('',true).'user/login/');
	}
}

?>