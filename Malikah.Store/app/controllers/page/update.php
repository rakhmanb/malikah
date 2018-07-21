<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new Page($_POST['Id']);
		$page->rs['Name'] = $_POST['Name'];
        $page->rs['DisplayName'] = $_POST['DisplayName'];
		$page->rs['Content'] = $_POST['Content'];
		$page->update();
		header("Location:".myUrl('',true)."pagecategory/updatepagecategory/".$page->rs['PageCategoryId']);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'page/updatepage/'.$id);
	}
}

?>