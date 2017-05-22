<?php

function _addcategory()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$data['body'][]=View::do_fetch(VIEW_PATH.'category/addcategory.php');
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'category/addcategory');
	}

}

?>