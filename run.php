<?php
$url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$url .= "://" . $_SERVER['HTTP_HOST'];
$url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
echo file_get_contents($url.'/record_mutasi/run');