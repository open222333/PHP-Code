<?php

function post()
{
}

function get_device_type()
{
	// 判斷 ios android other
	if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPhone') || strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')) {
		return 'ios';
	} else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Android')) {
		return 'android';
	} else {
		return 'other';
	}
}
