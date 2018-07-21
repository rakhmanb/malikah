<?php
class Comment extends Model {

  function __construct($id='') {
    parent::__construct('Id','Comment'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Comment'] = '';
    $this->rs['UserId'] = '';
	$this->rs['Date'] = '';
    $this->rs['BlogId'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}