<?php

function _additem()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$data['body'][]=View::do_fetch(VIEW_PATH.'item/additem.php');
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'item/additem');
	}

}

?>