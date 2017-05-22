<?php

function _addpagecategory()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$data['body'][]=View::do_fetch(VIEW_PATH.'pagecategory/addpagecategory.php');
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'pagecategory/addpagecategory');
	}

}

?>