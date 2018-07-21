<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$category = new Category($_POST['Id']);
		$category->rs['Name'] = $_POST['Name'];
		$category->rs['ShopId'] = $_POST['ShopId'];
		$category->update();
		
		header("Location:".myUrl('',true).'shop/admin/');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'category/updatecategory/'.$id);
	}

}

?>