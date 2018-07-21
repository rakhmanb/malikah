<?php

function _updateblog($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$blog = new Blog($id);
		
		$data['Title'] = $blog->rs['Title'];
		$data['Post'] = $blog->rs['Post'];
		$data['Id'] = $id;
		$data['body'][]=View::do_fetch(VIEW_PATH.'blog/updateblog.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'blog/admin');
	}

}

?>