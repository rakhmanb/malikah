<?php
class User extends Model {

  function __construct($id='') 
  {
    parent::__construct('Id','User'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Username'] = '';
    $this->rs['Email'] = '';
    $this->rs['Password'] = '';
    $this->rs['Address'] = '';
    $this->rs['Administrator'] = '';
	  $this->rs['Firstname'] = '';
    $this->rs['Lastname'] = '';
    $this->rs['ExtraInfo'] = '';
    $this->rs['Date'] = '';
    if ($id)
    {
      $this->retrieve($id);
    }
  }

  function create() 
  {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }
}