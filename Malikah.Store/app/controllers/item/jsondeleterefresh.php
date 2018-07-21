<?php

function _jsondeleterefresh($itemid, $collectionid)
{
	$item = new Item($itemid);
	$item->delete();
	$itemarrs = $item->retrieve_many('CollectionId = ?', $collectionid);

	echo json_encode($itemarrs);
}


?>