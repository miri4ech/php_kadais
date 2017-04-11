<?php 
	$name = $_POST['name'];
	$birthday = $_POST['birthday'];
	$height   = $_POST['height'];
	$lucky_number = rand(1,10);

	echo "私の名前は{$name}です。";
	echo "<br />";
	echo "誕生日は{$birthday}で、身長は{$height}cmです。";
	echo "<br />";
	echo "今日のラッキーナンバーは{$lucky_number}です！";
?>