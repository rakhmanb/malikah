<?php
function _page($page=1,$size=10) 
{
  $blogs = new Blog();
  $offset = (($page-1) * $size);
  
  $arr = $blogs->retrieve_many('Id > 0 ORDER BY Id DESC LIMIT '.$size.' OFFSET '.$offset);
  
  $allblogs = $blogs->retrieve_many('Id > 0');
  
  $numpages = sizeof($allblogs)/10;
  
  if($allblogs%10 > 0)
  {
   $p = floor($numpages);
   $p = $p + 1;
  }

  $data['page'] = $page;
  $data['pages'] = $p;
  $data['blogposts'][] = $arr;
  $data['body'][]=View::do_fetch(VIEW_PATH.'blog/page.php', $data);
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
}

?>