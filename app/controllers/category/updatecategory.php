<?php

function _updatecategory($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$category = new Category($id);
		
		$data['category'] = $category;
		$data['body'][]=View::do_fetch(VIEW_PATH.'category/updatecategory.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'category/updatecategory/'.$id);
	}

}

?>