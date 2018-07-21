<?php
class CategoryCollection extends Model {

  function __construct($id='') {
    parent::__construct('Id','CategoryCollection'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['CollectionId'] = '';
    $this->rs['CategoryId'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}