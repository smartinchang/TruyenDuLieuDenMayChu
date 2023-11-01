<?php
	$text = $_GET["text"];
	$conn = new mysqli("localhost","root","","xte");
	$sql = "UPDATE `sample` SET `text`='$text' WHERE `id`=1";
	$conn -> query($sql);
	$sql = "SELECT `text` FROM `sample` WHERE `id`=1";
	$result = $conn -> query($sql);
	$row = $result -> fetch_assoc();
	echo($row["text"]);
	//echo($text);
?>