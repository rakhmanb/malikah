<?php

function _page($id, $page)
{
	$coll = new Collection($id);
	$item = new Item();
	$arrAllItems = $item->retrieve_many("CollectionId = ?", $id);
	$pageSize = sizeof($arrAllItems)/8;

	if($pageSize%8 > 0)
	{
		$pageSize = ceil($pageSize);
	}

	$offset = ($page * 2) - 1;

	$arr = $item->retrieve_many("CollectionId = ? LIMIT 8 OFFSET ?", $id, $offset);

  $data['collection'] = $coll;
  $data['items'][] = $arr;
  $data['pagesize'] = $pageSize;
  $data['body'][]=View::do_fetch(VIEW_PATH.'collection/view.php',$data);
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);

}


?>
