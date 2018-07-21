<?php

function _delete($id)
{
    if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new Page($id);
        $pagecategoryid = $page->rs['PageCategoryId'];
        if($pageCat)
        {
            $page->delete();
            header("Location:".myUrl('',true).'pagecategory/update/'.$pagecategoryid);
        }
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/delete/'.$id);
	}
}


?>