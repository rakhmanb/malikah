<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$collection = new Collection($_POST['Id']);
        $collection->rs['Name'] = $_POST['Name'];
        $collection->rs['ShopId'] = $_POST['ShopId'];
        $collection->rs['Year'] = $_POST['Year'];
        $collection->rs['SeasonId'] = $_POST['SeasonId'];
        $collection->rs['Indefinite'] = '';
    	$collection->rs['Description'] = $_POST['Description'];

		if(isset($_POST['Indefinite']))
		{
			$collection->rs['Indefinite'] = $_POST['Indefinite'];	
		}

        $directory = "resources/uploads/";

        if(isset($_FILES['Image']['name']) && $_FILES['Image']['name'] != '')
        {
	    	$imageFileType = pathinfo($_FILES['Image']['name'],PATHINFO_EXTENSION);
	    	$target_file = $directory.'CollectionImage_'.$collection->rs['Id'].'.'.$imageFileType;
	    	move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);

	    	$collection->rs['Image'] = $target_file;
			$collection->update();
		}

		$categories = $_POST['category'];

		$catcolls = new CategoryCollection();
		$catcollsarr = $catcolls->retrieve_many('CollectionId = ?', $collection->rs['Id']);

		for($i = 0; $i < sizeof($catcollsarr); $i++)
		{
			$catcollsarr[$i]->delete();
		}

		foreach($categories as $cat)
		{
			$catcoll = new CategoryCollection();
			$catcoll->rs['CollectionId'] = $collection->rs['Id'];
			$catcoll->rs['CategoryId'] = $cat;
			$catcoll->create();
		}

		
		header("Location:".myUrl('',true).'shop/admin');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'shop/admin');
	}

}

?>