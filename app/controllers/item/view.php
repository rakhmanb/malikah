<?php
	function _view($id) 
	{
	  $item = new Item($id);
	  $photo = new Picture();
	  $photoarr = $photo->retrieve_many('ItemId = ?', $id);

	  if($item->rs['CoverPhotoId'] == 0)
	  {
	  	$coverphoto = new Picture($photoarr[0]->rs['Id']);
	  }
	  else
	  {
	  	$coverphoto = new Picture($item->rs['CoverPhotoId']);
	  }

	  $data['item'] = $item;
	  $data['pictures'] = $photoarr;
	  $data['coverphoto'] = $coverphoto;
	  $data['body'][]=View::do_fetch(VIEW_PATH.'item/view.php',$data);
	  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
?>