<?php

function _add()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$item = new Item();
        $item->rs['Name'] = $_POST['Name'];
        $item->rs['Description'] = $_POST['itemDescription'];
        $item->rs['Price'] = $_POST['Price'];
        $item->rs['Sku'] = '';
        $item->rs['CollectionId'] = $_POST['CollectionId'];
        $item->rs['AvailableInventory'] = $_POST['AvailableInventory'];
        $item->create();

        $coverphotoId = $_POST['imageCoverRadio'];

        $directory = "resources/uploads/";

        for($i = 0; $i < sizeof($_FILES['filesImages']['name']); $i++)
        {
        	$imageFileType = pathinfo($_FILES['filesImages']['name'][$i],PATHINFO_EXTENSION);

        	$photo = new Picture();
        	$photo->rs['ItemId'] = $item->rs['Id'];
			$createdPhoto = $photo->create();

                $target_file = $directory.'fileImage_'.$item->rs['CollectionId'].'_'.$item->rs['Id'].'_'.$createdPhoto->rs['Id'].'.'.$imageFileType;
                move_uploaded_file($_FILES["filesImages"]["tmp_name"][$i], $target_file);

                                        $photo->rs['Data'] = $target_file;

                                        $photo->update();


			if('itemImage'.($i+1) == $coverphotoId)
			{
				$item->rs['CoverPhotoId'] = $photo->rs['Id'];
				$item->update();
			}

        }
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'item/additem');
	}

}

?>