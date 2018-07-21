<?php
require('kissmvc_core.php');

//===============================================================
// Model/ORM
//===============================================================
class Model extends KISS_Model  {

  //Example of adding your own method to the core class
  function gethtmlsafe($key) {
    return htmlspecialchars($this->get($key));
  }

}

//===============================================================
// Controller
//===============================================================
class Controller extends KISS_Controller {



}

//===============================================================
// View
//===============================================================
class View extends KISS_View {

  //Example of overriding a constructor/method, add some code then pass control back to parent
  function __construct($file='',$vars='') {
    $file = VIEW_PATH.$file;
    return parent::__construct($file,$vars);
  }

}
