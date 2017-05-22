<?php

function _jsonrefresh($collectionid)
{
	$item = new Item();
	$itemarrs = $item->retrieve_many('CollectionId = ?', $collectionid);

	echo json_encode($itemarrs);
}


?>