<?php

function _updatepage($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new Page($id);
	
		$data['page'] = $page;
		$data['body'][]=View::do_fetch(VIEW_PATH.'page/updatepage.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/updatepage/'.$id);
	}

}

?>