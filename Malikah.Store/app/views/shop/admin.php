<h1>Shop Administration</h1>


<h2>Collections: <small><a href='<?php echo myUrl('')."collection/addcollection"; ?>'>Add Collection+</a></small></h2>
<div class="collections">
<?php

	if(sizeof($collections[0]) == 0)
	{
		echo "<div>No Collections available</div>";
	}
	
	for($i = 0; $i < sizeof($collections[0]); $i++)
	{
		echo "<div class='row'><div class='col-md-3'>".$collections[0][$i]->rs['DisplayName']."</div><div class='col-md-3'>".$collections[0][$i]->rs['Date']."</div><div class='col-md-3'><a href='".myUrl('')."collection/updatecollection/".$collections[0][$i]->rs['Id']."'>Edit</a></div><div class='col-md-3'><a href='".myUrl('')."collection/delete/".$collections[0][$i]->rs['Id']."'>Delete</a></div></div>";
	}

?>
</div>

<h2>Categories: <small><a href='<?php echo myUrl('')."category/addcategory"; ?>'>Add Category+</a></small></h2>
<div class="categories">
<?php

	if(sizeof($categories[0]) == 0)
	{
		echo "<div>No Categories available</div>";
	}
	
	for($i = 0; $i < sizeof($categories[0]); $i++)
	{
		echo "<div class='row'><div class='col-md-3'>".$categories[0][$i]->rs['Name']."</div><div class='col-md-3'>".$categories[0][$i]->rs['Date']."</div><div class='col-md-3'><a href='".myUrl('')."category/updatecategory/".$categories[0][$i]->rs['Id']."'>Edit</a></div><div class='col-md-3'><a href='".myUrl('')."category/delete/".$categories[0][$i]->rs['Id']."'>Delete</a></div></div>";
	}

?>
</div>