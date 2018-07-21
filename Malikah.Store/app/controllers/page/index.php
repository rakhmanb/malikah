<?php

function _index($name)
{
	$page = new Page();
	$p = $page->retrieve_one('Name = ?',$name);

	if($p)
	{
		$data['content'] = $p->rs['Content'];
		$data['body'][]=View::do_fetch(VIEW_PATH.'page/index.php', $data);
		View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
	}
}


?>