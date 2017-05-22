<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$category = new Category();
		$category->rs['Name'] = $_POST['Name'];
		$category->rs['ShopId'] = $_POST['ShopId'];
		$category->create();
		
		header("Location:".myUrl('',true).'shop/admin');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'category/addcategory');
	}

}

?>