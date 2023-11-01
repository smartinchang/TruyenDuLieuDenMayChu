<!DOCTYPE html>
<html lang="vi">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<title>XUÂN TUYẾN Education - Nền tảng học lập trình trực tuyến</title>
		<meta name="description" content="XUÂN TUYẾN Education - Nền tảng đào tạo lập trình trực tuyến">
		<meta name="keywords" content="html, css, javascript, online editor, xuan tuyen, xuan tuyen education, education">
		<link href="logo.png" rel="icon">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="mt-4 p-5 bg-primary text-white rounded">
				<h1 align="center">Thử nghiệm việc xử lý dữ liệu trước khi truyền đi</h1>
			</div>
			<br>
			<div class="row">
				<div class="col">
					<p align="center"><b>Dữ liệu</b></p>
					<input class="form-control" type="text" id="inputData">
					<div align="right"><button type="button" class="btn btn-primary mt-1" onclick="inputChange()">Thực hiện</button></div>
					<br>
					<p align="center"><b>Kết quả xử lý của Javascript để truyền đến máy chủ</b></p>
					<div id="outputData" class="border mw-100" style="word-wrap:break-word;overflow-y:scroll;height:100px"></div>
				</div>
				<div class="col">
					<p align="center"><b>Dữ liệu trả về từ máy chủ</b></p>
					<div id="saveData" class="border mw-100" style="word-wrap:break-word;overflow-y:scroll;height:150px"></div>
					<br>
					<p align="center"><b>Hiển thị từ máy chủ</b></p>
					<div id="displayData" class="border mw-100" style="word-wrap:break-word;overflow-y:scroll;height:150px"></div>
				</div>
			</div>
		</div>
	</body>
	<script>
		function inputChange() {
			outputData = $("#inputData").val();
			outputData = outputData.replace(/\'/gi, '&#39;');
			outputData = outputData.replace(/\"/gi, '&#34;');
			outputData = outputData.replace(/\+/gi, '&#43;');
			outputData = outputData.replace(/#/gi, '%23');
			outputData = outputData.replace(/\&/gi, '%26');
			$("#outputData").text(outputData);
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					$("#saveData").text(xhttp.responseText);
					output = xhttp.responseText;
					output = output.replace(/&#39;/gi, '\'');
					output = output.replace(/&#34;/gi, '\"');
					output = output.replace(/&#43;/gi, '\+');
					output = output.replace(/&#23;/gi, '\#');
					output = output.replace(/&#26;/gi, '\&');
					$("#displayData").html(output);
				}
			};
			xhttp.open("GET", "insertData.php?text=" + outputData, true);
			xhttp.send();
		}
	</script>
</html>
<?php
	// Kết nối với Google Analytic
	include("websiteGoogleAnalytic.inc");
?>