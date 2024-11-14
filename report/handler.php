<?php
require_once "stimulsoft/helper.php";

// Please configure the security level as you required.
// By default is to allow any requests from any domains.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Engaged-Auth-Token");

$handler = new StiHandler();
$handler->registerErrorHandlers();

$handler->onBeginProcessData = function ($args) {
	if ($args->connection == "qlns")
		$args->connectionString = "Server=localhost; Database=qlns;UserId=root; Pwd=Bvht079@;";

	$args->parameters["id"] = 0;
	

	return StiResult::success();
};

$handler->process();