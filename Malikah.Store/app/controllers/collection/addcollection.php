<?php

function _addcollection()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$coll = new Collection();
		$data['collection'] = $coll;
		$data['body'][]=View::do_fetch(VIEW_PATH.'collection/addcollection.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'collection/addcollection');
	}

}

?>