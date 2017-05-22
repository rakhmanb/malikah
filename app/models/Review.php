<?php
class Review extends Model {

  function __construct($id='') {
    parent::__construct('Id','Review'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['UserId'] = '';
    $this->rs['Review'] = '';
    $this->rs['Date'] = '';
    $this->rs['Rating'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}