<h1><?php echo $collection->rs['DisplayName'] ?></h1>

<?php

	$rows = sizeof($items[0])/4;
	
	$rows = ceil($rows);

	for($i = 0; $i < $rows; $i++)
	{
		echo '<div class="row">';
		$j = 0;
		while($j < sizeof($items[0]) && $j < 4)
		{
			$photo = new Picture();
			$photoArr = $photo->retrieve_many('ItemId = ?', $items[0][$j]->rs['Id']);

			$imageDir = '';

			if($items[0][$j]->rs['CoverPhotoId'] != '0' && $items[0][$j]->rs['CoverPhotoId'] != 0 && $items[0][$j]->rs['CoverPhotoId'] != '')
			{
				$coverPhoto = new Picture($items[0][$j]->rs['CoverPhotoId']);
			}
			else
			{
				$coverPhoto = $photoArr[0];
			}

			setlocale(LC_MONETARY, 'en_US.UTF-8');
			$price = money_format('%.2n', $items[0][$j]->rs['Price']);

			echo '  <div class="col-sm-6 col-md-3">
    <div class="thumbnail thumbnailitems"><h1><small>'.$items[0][$j]->rs['Name'].'</small></h1>
      <a href="'.myUrl('').'item/view/'.$items[0][$j]->rs['Id'].'"><img src="'.myUrl('',true).$coverPhoto->rs['Data'].'" alt="..."></a>
      <div class="caption">
        <p>'.$items[0][$j]->rs["Description"].'</p>
        <p>'.$price.'</p>
      </div>
    </div>
  </div>';
			$j++;
		}
		echo '</div>';
	}

?>
<div class="Row">
<div class="col-md-4">
</div>
<div class="col-md-4" style="text-align: center;">
<nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
<?php

		for($s = 0; $s < $pagesize; $s++)
		{
			echo "<li><a href='".myUrl('',true)."collection/page/".$collection->rs['Id']."/".($s+1)."'>".($s+1)."</a></li>";
		}
		
?>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
<div class="col-md-4">
</div>
</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		selectDropDown("shop");
	});
</script>
