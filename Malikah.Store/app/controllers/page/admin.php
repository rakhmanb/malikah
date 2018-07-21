<?php

function _admin()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$pageCat = new PageCategory();
		$arr = $pageCat->retrieve_many();
	
		$data['pagecategories'][] = $arr;
		$data['body'][]=View::do_fetch(VIEW_PATH.'page/admin.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'blog/admin');
	}

}

?>