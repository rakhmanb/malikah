<?php

function _updateitem($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$item = new Item($id);
		
		$data['item'] = $item;
		$data['body'][]=View::do_fetch(VIEW_PATH.'item/updateitem.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'collection/admin/'.$item->rs['CollectionId']);
	}

}

?>