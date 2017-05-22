<div>
<h1>The Official blog of Malikah</h1>

<?php
	for($i = 0; $i < sizeof($blogposts[0]); $i++)
	{
		$user = new User($blogposts[0][$i]->rs['UserId']);
		$blog = $blogposts[0][$i];
		
		$time = strtotime($blog->rs['Date']);
		$newDate = date('l F d Y',$time);
		
		echo "<div><h2>".$blog->rs['Title']."</h2><h1><small>".$newDate." by <a href='mailto:".$user->rs['Email']."'>".$user->rs['Firstname']."</a></small></h1><p>".$blog->rs['Post']."</p></div>";
	}

?>

<nav aria-label="...">
  <ul class="pager">
    <li class="previous <?php if($pages == 1) { echo "disabled";} ?>"><a href="<?php if($pages == 1) { echo "#";} else { echo myUrl('').'blog/page/2';} ?>"><span aria-hidden="true">&larr;</span> Older</a></li>
    <li class="next disabled"><a href="#">Newer <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>

</div>

<script type="text/javascript">
	$(document).ready(function()
	{
		selectLink("blog");
	});
</script>