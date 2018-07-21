<?php
class Category extends Model {

  function __construct($id='') {
    parent::__construct('Id','Category'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    $this->rs['ShopId'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}