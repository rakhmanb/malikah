<?php

function _admin()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$coll = new Collection();
		$arr = $coll->retrieve_many();
		$cats = new Category();
		$arr2 = $cats->retrieve_many();
	
		$data['collections'][] = $arr;
		$data['categories'][] = $arr2;
		$data['body'][]=View::do_fetch(VIEW_PATH.'shop/admin.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'shop/admin');
	}

}

?>