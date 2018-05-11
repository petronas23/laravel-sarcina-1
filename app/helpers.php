<?php

function display_json($message, $status = 'fail', $additional = [])
{
	die(json_encode(array_merge(['message' => $message, 'status' => $status], $additional)));
}