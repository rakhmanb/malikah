<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
	   $numberAdded = $_POST['numcats'];
       $collectionId = $_POST['CollectionId'];
       
       $categorycolls = new CategoryCollection();
       $categorycolls->retrieve_many('CollectionId = ?', $collectionId);
       $numcatcolls = sizeof($categorycolls);
       
       //delete all categorycollection objects for that collection
       for($v = 0; $v < $numcatcolls; $v++)
       {
            $numcatcolls[$v]->remove();
       }
       
       //recreate selected categories for collection
       for($i = 0; $i < $numberAdded; $i++)
       {
            $category = new CategoryCollection();
            $category->rs['CollectionId'] = $collectionId;
            $category->rs['CategoryId'] = $_POST['CategoryId'.($i+1)];
            $category->create();
       }
		
		header("Location:".myUrl('',true).'shop/admin');
	}
	else
	{
		header("Location:".myUrl('',true).'user/login/'.urlencode(myUrl('',true).'category/addcategory'));
	}

}

?>