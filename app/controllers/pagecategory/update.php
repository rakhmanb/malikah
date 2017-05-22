<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$page = new PageCategory($_POST['Id']);
		$page->rs['Name'] = $_POST['Name'];
		$page->rs['DisplayName'] = $_POST['DisplayName'];
		$page->update();
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'pagecategory/updatepagecategory');
	}
}

?>