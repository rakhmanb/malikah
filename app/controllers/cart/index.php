<?php

function _index()
{
  $cart = new Cart();
  $jsonArray = $cart->returnJsonArray();
  $data['cartArray'] = $jsonArray;
  $data['body'][]=View::do_fetch(VIEW_PATH.'cart/index.php', $data);
  View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
  //echo $data['cartArray'];
}


 ?>
