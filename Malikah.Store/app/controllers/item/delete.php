<?php

function _delete($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$item = new Item($id);
        
        if($item)
        {
    		$item->delete();
            header("Location:".myUrl('',true).'collection/updatecollection/'.$item->rs['CollectionId']);
        }
	}
	else
	{
        postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'item/delete/'.$id);
	}
}

?>