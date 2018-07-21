<?php
function _index() 
{
  $coll = new Collection();
  $arr = $coll->retrieve_many(" Indefinite <> ?", true);
  
  $data['collections'][] = $arr;
  $data['body'][]=View::do_fetch(VIEW_PATH.'collection/index.php',$data);
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
}