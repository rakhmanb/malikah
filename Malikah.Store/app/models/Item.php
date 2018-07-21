<?php
class Item extends Model {

  function __construct($id='')
  {
    parent::__construct('Id','Item'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    $this->rs['Description'] = '';
    $this->rs['Price'] = '';
    $this->rs['Sku'] = '';
    $this->rs['CategoryId'] = '';
    $this->rs['CollectionId'] = '';
    $this->rs['AvailableInventory'] = '';
    $this->rs['CoverPhotoId'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create()
  {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }

  function delete()
  {
  	$photo = new Picture();
  	$photoarr = $photo->retrieve_many('ItemId = ?', $this->rs['Id']);

  	for($i = 0; $i < sizeof($photoarr); $i++)
  	{
  		//delete image file
  		unlink($photoarr[$i]->rs['Data']);
  	}

  	return parent::delete();
  }
}
