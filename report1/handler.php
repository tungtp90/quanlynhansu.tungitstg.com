<?php
require_once "../vendor/autoload.php";

use Stimulsoft\Events\StiDataEventArgs;
use Stimulsoft\Events\StiExportEventArgs;
use Stimulsoft\Events\StiReportEventArgs;
use Stimulsoft\Events\StiVariablesEventArgs;
use Stimulsoft\StiHandler;
use Stimulsoft\StiResult;

// You can configure the security level as you required.
// By default is to allow any requests from any domains.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Engaged-Auth-Token");
header("Cache-Control: no-cache");

$handler = new StiHandler();

$handler->onBeginProcessData = function ($args) {
	return StiResult::success();
};

$handler->process();