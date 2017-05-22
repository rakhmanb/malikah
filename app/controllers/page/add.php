<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new Page();
		$page->rs['Name'] = $_POST['Name'];
		$page->rs['Content'] = $_POST['Content'];
        $page->rs['DisplayName'] = $_POST['DisplayName'];
		$page->rs['PageCategoryId'] = $_POST['PageCategoryId'];
		$page->create();
		header("Location:".myUrl('',true)."pagecategory/updatepagecategory/".$_POST['PageCategoryId']);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/addpage');
	}
}

?>