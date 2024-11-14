<?php
require_once "../vendor/autoload.php";

use Stimulsoft\Enums\StiComponentType;
use Stimulsoft\Report\StiReport;
use Stimulsoft\StiHandler;
use Stimulsoft\StiJavaScript;
use Stimulsoft\StiResult;
use Stimulsoft\Viewer\Enums\StiToolbarDisplayMode;
use Stimulsoft\Viewer\Enums\StiViewerTheme;
use Stimulsoft\Viewer\StiViewer;
use Stimulsoft\Viewer\StiViewerOptions;

?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<title>Report.mrt - Viewer</title>
	<style>html, body { font-family: sans-serif; }</style>

	<?php
	$js = new StiJavaScript(StiComponentType::Viewer);
	$js->renderHtml();
	?>

	<script type="text/javascript">
		<?php
		$handler = new StiHandler();
		$handler->renderHtml();

		$report = new StiReport();
		$report->loadFile("reports/Report.mrt");

		$options = new StiViewerOptions();
		$viewer = new StiViewer($options);
		$viewer->onBeginProcessData = "onBeginProcessData";
		$viewer->report = $report;
		?>

		function onLoad() {
			<?php
			$viewer->renderHtml("viewerContent");
			?>
		}

		function onBeginProcessData(args) {

		}
	</script>
</head>
<body onload="onLoad()">
	<div id="viewerContent"></div>
</body>
</html>