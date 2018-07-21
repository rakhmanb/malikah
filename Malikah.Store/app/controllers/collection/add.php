<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$collection = new Collection();
        $collection->rs['Name'] = $_POST['Name'];
        $collection->rs['DisplayName'] = $_POST['DisplayName'];
        $collection->rs['ShopId'] = $_POST['ShopId'];
        $collection->rs['Year'] = $_POST['Year'];
        $collection->rs['SeasonId'] = $_POST['SeasonId'];
		$collection->rs['Indefinite'] = '0';


		if(isset($_POST['Indefinite']))
		{
        	$collection->rs['Indefinite'] = $_POST['Indefinite'];
    	}

    	$collection->rs['Description'] = $_POST['Description'];
        $directory = "resources/uploads/";

        $curCol = $collection->create();

        $categories = '';

        if(isset($_POST['category']))
        {
	        $categories = $_POST['category'];

	        foreach($categories as $cat)
			{
				$catcoll = new CategoryCollection();
				$catcoll->rs['CollectionId'] = $curCol;
				$catcoll->rs['CategoryId'] = $cat;
				$catcoll->create();
			}
		}

		if(isset($_FILES['Image']['name']) && $_FILES['Image']['name'] != '')
		{
	    	$imageFileType = pathinfo($_FILES['Image']['name'],PATHINFO_EXTENSION);
	    	$target_file = $directory.'CollectionImage_'.$curCol->rs['Id'].'.'.$imageFileType;
	    	move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);

	    	$collection->rs['Image'] = $target_file;
	    	$collection->update();
    	}

		header("Location:".myUrl('',true).'shop/admin/');
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'shop/admin');
	}

}

?>