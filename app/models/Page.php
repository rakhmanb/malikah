<?php
class Page extends Model {

  function __construct($id='') {
    parent::__construct('Id','Page'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    $this->rs['DisplayName'] = '';
    $this->rs['Content'] = '';
    $this->rs['PageCategoryId'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}