<?php

function _logout()
{
	session_destroy();
	header("Location:".myUrl('',true));
}

?>