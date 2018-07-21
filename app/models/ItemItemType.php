<?php

class ItemItemType extends Model
{
  function __construct($id='')
  {
    parent::__construct('ID','ItemItemType'); //primary key = uid; tablename = users
    $this->rs['ID'] = '';
    $this->rs['ItemID'] = '';
    $this->rs['ItemTypeID'] = '';
    if ($id)
    {
      $this->retrieve($id);
    }
  }
}


 ?>
