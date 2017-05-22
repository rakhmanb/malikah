<h1>Admin Blog <small><a href="<?php echo myUrl(''); ?>blog/addblog/">Add+</a></small></h1>
<h2>Your Posts:</h2>
<?php

if(sizeof($blogposts[0]) == 0)
{
	echo "<h2>You dont have any posts, get started with one!</h2>";
}

for($i = 0; $i < sizeof($blogposts[0]); $i++)
{
	echo "<div class=\"row\"><div class='col-md-3'>".$blogposts[0][$i]->rs["Title"]."</div><div class='col-md-3'>".$blogposts[0][$i]->rs["Date"]."</div><div class='col-md-3'><a href=\"".myUrl('')."blog/updateblog/".$blogposts[0][$i]->rs["Id"]."\">Update</a></div><div class='col-md-3'>
	<a href=\"".myUrl('')."blog/delete/".$blogposts[0][$i]->rs["Id"]."\">Delete</a></div></div>";
}

?>