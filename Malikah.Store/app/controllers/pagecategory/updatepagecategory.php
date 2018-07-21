<?php

function _updatepagecategory($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$pagecategory = new PageCategory($id);
        $pages = new Page();
        $arr = $pages->retrieve_many('PageCategoryId = ?',$id);
	
        $data['pages'][] = $arr;
		$data['pagecategory'] = $pagecategory;
		$data['body'][]=View::do_fetch(VIEW_PATH.'pagecategory/updatepagecategory.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'pagecategory/updatepagecategory/'.$id);
	}

}

?>