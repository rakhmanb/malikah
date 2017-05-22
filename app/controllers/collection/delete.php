<?php

function _delete($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$collection = new Collection($id);
        
        if($collection)
        {
		  $collection->delete();
		  header("Location:".myUrl('',true).'shop/admin/');
        }
	}
	else
	{
        postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'collection/delete/'.$id);
	}
}

?>