<?php

function _updatecollection($id)
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$collection = new Collection($id);
		$categories = new CategoryCollection();
		$items = new Item();
		$arrcats = $categories->retrieve_many('CollectionId = ?', $collection->rs['Id']);
		$arritems = $items->retrieve_many('CollectionId = ?', $collection->rs['Id']);
		
		$data['categorycollections'][] = $arrcats;
		$data['items'][] = $arritems;
		$data['collection'] = $collection;
		$data['body'][]=View::do_fetch(VIEW_PATH.'collection/updatecollection.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'shop/admin');
	}

}

?> 