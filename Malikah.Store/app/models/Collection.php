<?php
class Collection extends Model 
{

  function __construct($id='') 
  {
    parent::__construct('Id','Collection'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    $this->rs['DisplayName'] = '';
    $this->rs['ShopId'] = '';
    $this->rs['Year'] = '';
    $this->rs['SeasonId'] = '';
    $this->rs['Indefinite'] = '';
    $this->rs['Description'] = '';
    $this->rs['Image'] = '';
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