<?php 
	$lunch_price1 = 420;
	$lunch_price2 = 380;
	$lunch_count1 = 2;
	$lunch_count2 = 10;
	$tax = 1.08;

	echo "昨日は{$lunch_price1}円（税抜）の弁当を{$lunch_count1}個食べました。";
	echo "<br />";
	echo "昨日の弁当代は".intval($lunch_price1*$lunch_count1*$tax)."円（税込）です。";
	echo "<br />";
	echo "今日は{$lunch_price2}円（税抜）の弁当を{$lunch_count2}個食べました。";
	echo "<br />";
	echo "今日の弁当代は".intval($lunch_price2*$lunch_count2*$tax)."円（税込）です。";
	echo "<br />";
	echo "昨日と今日で".intval(($lunch_price1*$lunch_count1+$lunch_price2*$lunch_count2)*$tax)."円(税込)使いました。";
?>