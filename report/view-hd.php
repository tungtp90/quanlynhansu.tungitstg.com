<?php
require_once "stimulsoft/helper.php";
?>
<!DOCTYPE html>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>rp_hop_dong_main.mrt - Viewer</title>
	<link rel="stylesheet" type="text/css" href="css/stimulsoft.viewer.office2013.whiteblue.css">
	<script type="text/javascript" src="scripts/stimulsoft.reports.js"></script>
	<script type="text/javascript" src="scripts/stimulsoft.reports.maps.js"></script>
	<script type="text/javascript" src="scripts/stimulsoft.viewer.js"></script>

	<?php
		//$id= $_GET["id"];
		//echo "<script>alert('ID là.$id')</script>";
		$options = StiHelper::createOptions();
		$options->handler = "handler.php";
		$options->timeout = 30;
		StiHelper::initialize($options);
	?>
	<script type="text/javascript">
		function Start() {
		 	var mahopdong = <?php echo $_GET["id"] ?>;			
		 	Stimulsoft.Base.StiLicense.loadFromFile("license.key");
		 	//Stimulsoft.Base.Localization.StiLocalization.setLocalizationFile("localization/vi.xml", true);
		 	var report = new Stimulsoft.Report.StiReport();
		 	report.loadFile("reports/hd.mrt?v=" + Math.random());
		 	//report.loadFile("reports/rp-hop-dong-main.mrt");
		 	report.dictionary.variables.getByName("id").valueObject = mahopdong;
		 	var options = new Stimulsoft.Viewer.StiViewerOptions();
		 	options.cacheMode = 'noCache'; // no cache trình xem
			//options.pagesRange = '1,3,5'; // Thay thế bằng danh sách các trang lẻ bạn muốn in
		 	var viewer = new Stimulsoft.Viewer.StiViewer(options, "StiViewer", false);
		 	viewer.onBeginProcessData = function (args, callback) {
		 		<?php StiHelper::createHandler(); ?>
		 	}
			 
		 	viewer.report = report;
		 	viewer.renderHtml("viewerContent");		
			// Bật chế độ in của trình duyệt tự động
			report.renderAsync(function(){
			report.print();			
			});		 
		}	
	</script>
	<script>setTimeout("location='../pages/danh-sach-da-ky-hd.php'",1000);</script>
</head>
<body onload="Start()">
	<div id="viewerContent"></div>
</body>
</html>