<?php

class ItemType extends Model
{
  function __construct($id='')
  {
    parent::__construct('ID','ItemType'); //primary key = uid; tablename = users
    $this->rs['ID'] = '';
    $this->rs['Type'] = '';
    $this->rs['ItemTypeGroup'] = '';
    if ($id)
    {
      $this->retrieve($id);
    }
  }

  //do joins on corresponding tables to get quantities for all item types for this item
  function GetItemTypeQuantityItems($itemid)
  {
    $dbh=$this->getdbh();
    $sql = "SELECT it.Id as 'itemid', itp.ID as 'itemtypeid', it.Name as 'itemname', itp.type, itp.itemtypegroup as 'group', iitq.quantity, iitq.availablequantity FROM ".$this->enquote("Item")." as it "
     .'inner join malikah.itemitemtype as iit on iit.ItemID = it.Id '
     .'inner join malikah.itemtype as itp on itp.ID = iit.ItemTypeID '
     .'inner join malikah.itemitemtypequantity as iitq '
     .'on iitq.ItemID = iit.ItemID and iitq.ItemTypeID = itp.ID '
     .'WHERE it.Id =?';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(1,(int)$itemid);
    $stmt->execute();
    $arr=array();
    while ($Items = $stmt->fetch(PDO::FETCH_ASSOC))
    {
      if(!isset($arr[$Items["group"]]))
      {
        $arr[$Items["group"]] = array();
        array_push($arr[$Items["group"]], $Items);
      }
      else
      {
        array_push($arr[$Items["group"]], $Items);
      }
    }

    return $arr;
  }
}

 ?>
