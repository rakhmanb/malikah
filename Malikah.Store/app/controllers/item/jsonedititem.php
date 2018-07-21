<?php

function _jsonedititem($id)
{
	$item = new Item($id);
	if(is_null($item->rs['Description']))
	{
		$item->rs['Description'] = '';
	}

	$photo = new Picture();
	$photoarr = $photo->retrieve_many('ItemId = ?', $id);
	
	$objArr = array("Item"=>$item->rs, "Photos"=>$photoarr);
	
	echo json_encode($objArr);

}

?>