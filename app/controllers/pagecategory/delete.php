<?php

function _delete($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$pagecategory = new PageCategory($id);
        
        if($pagecategory)
        {
		  $page->delete();
        }
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/admin');
	}
}

?>