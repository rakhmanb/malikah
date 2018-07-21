<?php

	function _post()
	{
		$email = $_POST["email"];

		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, "http://just39.justhost.com/mailman/subscribe/subscribed_malikahatelier.com?email=".$email);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, false);

		$result = curl_exec($curl);

		curl_close($curl);

		return $result;
	}

?>