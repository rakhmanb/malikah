<form action="<?php echo myUrl(''); ?>pagecategory/add" method="post">
  <div class="form-group">
    <label for="exampleInputTitle">Name</label>
    <input type="text" class="form-control" id="Name" name="Name" placeholder="Name" value="<?php echo $pagecategory->rs['Name']; ?>">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">DisplayName</label>
    <input type="text" class="form-control" id="DisplayName" name="DisplayName" placeholder="DisplayName" value="<?php echo $pagecategory->rs['DisplayName']; ?>">
  </div>
  <button type="submit" class="btn btn-default">Update</button>
</form>


<h1>Pages for Category<small><a href="<?php echo myUrl('').'page/addpage/'.$pagecategory->rs['Id']; ?>">Add Page+</a></small></h1>
<h2>Pages:</h2>
<?php

if(sizeof($pages[0]) == 0)
{
	echo "<h2>no items available</h2>";
}

for($i = 0; $i < sizeof($pages[0]); $i++)
{
	echo "<div class=\"row\"><div class='col-md-3'>".$pages[0][$i]->rs["DisplayName"]."</div><div class='col-md-3'>".$pages[0][$i]->rs["Date"]."</div><div class='col-md-3'><a href=\"".myUrl('')."page/updatepage/".$pages[0][$i]->rs["Id"]."\">Update</a></div><div class='col-md-3'>
	<a href=\"".myUrl('')."page/delete/".$pages[0][$i]->rs["Id"]."\">Delete</a></div></div>";
}
