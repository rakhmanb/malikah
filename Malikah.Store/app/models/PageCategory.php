<?php
class PageCategory extends Model {

  function __construct($id='') {
    parent::__construct('Id','PageCategory'); //primary key = uid; tablename = users
    $this->rs['Id'] = '';
    $this->rs['Name'] = '';
    $this->rs['DisplayName'] = '';
    $this->rs['Date'] = '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['Date']=date('Y-m-d H:i:s');
    return parent::create();
  }

  function getPagesInCategory($categoryname)
  {
    $page = new Page();
    $pages = $page->retrieve_many('PageCategoryId = ?', $categoryname);
    return $pages;
  }
}