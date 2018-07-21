<?php
class Season extends Model 
{

  function __construct($id='') 
  {
    parent::__construct('Id','Season'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    if ($id)
    {
      $this->retrieve($id);
    }
  }
}