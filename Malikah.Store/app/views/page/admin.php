<h1>Admin Page <small><a href="<?php echo myUrl(''); ?>pagecategory/addpagecategory/">Add Page Category+</a></small></h1>
<h2>Page Categories:</h2>
<?php

if(sizeof($pagecategories[0]) == 0)
{
	echo "<h2>no items available</h2>";
}

for($i = 0; $i < sizeof($pagecategories[0]); $i++)
{
	echo "<div class=\"row\"><div class='col-md-3'>".$pagecategories[0][$i]->rs["DisplayName"]."</div><div class='col-md-3'>".$pagecategories[0][$i]->rs["Date"]."</div><div class='col-md-3'><a href=\"".myUrl('')."pagecategory/updatepagecategory/".$pagecategories[0][$i]->rs["Id"]."\">Update</a></div><div class='col-md-3'>
	<a href=\"".myUrl('')."pagecategory/delete/".$pagecategories[0][$i]->rs["Id"]."\">Delete</a></div></div>";
}

?>