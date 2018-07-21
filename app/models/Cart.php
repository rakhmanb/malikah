<?php
class Cart
{
  public function addItem($cartitem)
  {
    if(isset($_SESSION['shoppingcart']))
    {
      $arr = json_decode($_SESSION['shoppingcart']);
      array_push($arr, $cartitem);
      $_SESSION['shoppingcart'] = json_encode($arr);
      $_SESSION['shoppingcartquantity'] = $_SESSION['shoppingcartquantity'] + 1;
    }
    else
    {
      $_SESSION['shoppingcart'] = json_encode(array($cartitem));
      $_SESSION['shoppingcartquantity'] = 1;
    }
  }

  public function removeItem($cartitemID)
  {
    if(isset($_SESSION['shoppingcart']))
    {
      $arr = json_decode($_SESSION['shoppingcart']);

      for($i = 0; $i < $arr.count(); $i++)
      {
        if($arr[$i]->idtemid == $cartitemID)
        {
          array_splice($arr,$i,1);
        }
      }

      $_SESSION['shoppingcart'] = json_encode($arr);
      $_SESSION['shoppingcartquantity'] = $_SESSION['shoppingcartquantity'] - 1;
    }
  }

  public function getQuantity()
  {
    if(isset($_SESSION['shoppingcartquantity']))
    {
      return $_SESSION['shoppingcartquantity'];
    }
    else
    {
      return 0;
    }
  }

  public function returnJsonArray()
  {
    if(isset($_SESSION['shoppingcart']))
    {
      return json_encode($_SESSION['shoppingcart']);
    }
    else
    {
      return json_encode(array());
    }
  }
}
 ?>
