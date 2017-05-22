<?php

function _update()
{
	if(isset($_SESSION['Username']) && $_SESSION['Administrator'] == 1)
	{
		$item = new Item($_POST['EditItemId']);
        $item->rs['Name'] = $_POST['EditName'];
        $item->rs['Description'] = $_POST['itemEditDescription'];
        $item->rs['Price'] = $_POST['EditPrice'];
        $item->rs['CollectionId'] = $_POST['EditCollectionId'];
        $item->rs['AvailableInventory'] = $_POST['AvailableEditInventory'];

		//exisiting images processing
		$photo = new Picture();
		$photoarr = $photo->retrieve_many('ItemId = ?',$item->rs['Id']);
		$exisitingImagesArr = '';

		if(isset($_POST['existingImage']))
		{
			$exisitingImagesArr = $_POST['existingImage'];
			for($j = 0; $j < sizeof($photoarr); $j++)
			{
				$delete = true;
				for($i = 0; $i < sizeof($exisitingImagesArr); $i++ )
				{
					if($photoarr[$j]->rs['Id'] == $exisitingImagesArr[$i])
					{
						$delete = false;

						//check cover photo selection
						$item->rs['CoverPhotoId'] = '';
						if(isset($_POST['imageCoverRadio']))
						{
							if($_POST['imageCoverRadio'] == ("itemImageExisting".$exisitingImagesArr[$i]))
							{
								$item->rs['CoverPhotoId'] = $exisitingImagesArr[$i];
							}
						}

					}
				}

				if($delete)
				{
					if($item->rs['CoverPhotoId'] == $photoarr[$j]->rs['Id'])
					{
						$item->rs['CoverPhotoId'] = 0;
					}

					$photoarr[$j]->delete();
				}
			}
		}
		else
		{
			for($d = 0; $d < sizeof($photoarr); $d++)
			{
				$photoarr[$d]->delete();
			}

			$item->rs['CoverPhotoId'] = 0;
		}

		//new images processing
		$k = 1;
		while(isset($_POST["newImage".$k]))
		{

			$data = $_POST["newImage".$k];
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			list($d,$extension) = explode('/', $type);

			$data = base64_decode($data);

			$photoNew = new Picture();
			$photoNew->rs['ItemId'] = $item->rs['Id'];
			$resultPhoto = $photoNew->create();

			$imagename = $_SERVER['DOCUMENT_ROOT'].'/resources/uploads/fileImage_'.$item->rs['CollectionId'].'_'.$item->rs['Id'].'_'.$resultPhoto->rs['Id'].'.'.$extension;

			$imagenameshort = 'resources/uploads/fileImage_'.$item->rs['CollectionId'].'_'.$item->rs['Id'].'_'.$resultPhoto->rs['Id'].'.'.$extension;

			file_put_contents($imagename, $data);


			$photoNew->rs['Data'] = $imagenameshort;
			$photoNew->update();

			//check cover photo selection
			if(isset($_POST['imageCoverRadio']))
			{
				if($_POST['imageCoverRadio'] == ("itemImageAdd".$k))
				{
					$item->rs['CoverPhotoId'] = $resultPhoto->rs['Id'];
				}
			}

			$k++;
		}

		$item->update();
		
	}
	else
	{
		postRedirectWithReturnURL(myUrl('',true).'user/login/', myUrl('',true).'collection/admin/'.$_POST['CollectionId']);
	}

}

function base64_to_jpeg($base64_string, $output_file) {
    $ifp = fopen($output_file, "wb"); 

    $data = explode(',', $base64_string);

    fwrite($ifp, base64_decode($data[1])); 
    fclose($ifp); 

    return $output_file; 
}

?>