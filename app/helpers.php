<?php

if (! function_exists('sms_code')) {
	function sms_code(string $message) :? int {
		$message = " {$message} ";
		$match = preg_match('/\b[\d]{4}[\s\n]/', $message, $matches);
		return isset($matches[0]) ? trim($matches[0]) : null;
	}
}