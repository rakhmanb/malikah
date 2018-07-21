<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new PageCategory();
		$page->rs['Name'] = $_POST['Name'];
		$page->rs['DisplayName'] = $_POST['DisplayName'];
		$page->create();
		header("Location:".myUrl('',true).'page/admin');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'pagecategory/addpagecategory');
	}
}

?>