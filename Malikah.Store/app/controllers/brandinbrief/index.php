<?php
function _index() 
{
  $data['body'][]=View::do_fetch(VIEW_PATH.'brandinbrief/index.php');
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
}