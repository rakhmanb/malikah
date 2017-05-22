<h1>Collections</h1>

<?php
	for($i = 0; $i < sizeof($collections); $i++)
	{
		$season = new Season($collections[0][$i]->rs["SeasonId"]);
		echo "<h1><small>".$collections[0][$i]->rs["Name"]." - ".$season->rs["Name"]." ".$collections[0][$i]->rs["Year"]."</small></h1>";
		echo '<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <a href="'.myUrl('').'collection/view/'.$collections[0][$i]->rs['Id'].'"><img src="'.myUrl('',true).$collections[0][$i]->rs['Image'].'" alt="..."></a>
      <div class="caption">
        <p>'.$collections[0][$i]->rs["Description"].'</p>
      </div>
    </div>
  </div>
</div>';
	}
?>

<script type="text/javascript">
	$(document).ready(function()
	{
		selectDropDown("shop");
	});
</script>