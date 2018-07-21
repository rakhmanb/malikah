<?php

function _success()
{
	$data['body'][]=View::do_fetch(VIEW_PATH.'user/success.php');
	View::do_dump(VIEW_PATH.'layouts/mainlayout.php',$data);
}


?>