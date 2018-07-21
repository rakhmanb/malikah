<?php

class ItemItemTypeQuantity extends Model
{
  function __construct($id='')
  {
    parent::__construct('ID','ItemItemTypeQuantity'); //primary key = uid; tablename = users
    $this->rs['ID'] = '';
    $this->rs['ItemID'] = '';
    $this->rs['ItemTypeID'] = '';
    $this->rs['Quantity'] = '';
    $this->rs['AvailableQuantity'] = '';
    if ($id)
    {
      $this->retrieve($id);
    }
  }
}

 ?>
