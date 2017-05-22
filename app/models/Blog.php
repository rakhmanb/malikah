<?php
class Blog extends Model {

  function __construct($id='') {
    parent::__construct('Id','Blog'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Title'] = '';
    $this->rs['Post'] = '';
	$this->rs['UserId'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}