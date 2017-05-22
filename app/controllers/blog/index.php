<?php
function _index() 
{
  $blogs = new Blog();
  $allblogs =   $arr = $blogs->retrieve_many('Id > 0');
  $arr = $blogs->retrieve_many('Id > 0 ORDER BY Id DESC LIMIT 10 OFFSET 0');
  
  $numpages = sizeof($allblogs)/10;
  
  if($allblogs%10 > 0)
  {
   $p = floor($numpages);
   $p = $p + 1;
  }

  $data['pages'] = $p; 
  $data['blogposts'][] = $arr;
  $data['body'][]=View::do_fetch(VIEW_PATH.'blog/index.php', $data);
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
}