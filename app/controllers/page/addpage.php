<?php

function _addpage($pagecategoryid)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$data['pagecategoryid'] = $pagecategoryid;
		$data['body'][]=View::do_fetch(VIEW_PATH.'page/addpage.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/addpage');
	}

}

?>