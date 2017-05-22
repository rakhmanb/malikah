<?php

function _delete($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$category = new Category($id);
        
        if($category)
        {
		  $category->delete();
		  header("Location:".myUrl('',true).'shop/admin/');
        }
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'category/delete/'.$id);
	}
}

?>