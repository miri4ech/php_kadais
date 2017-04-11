<div style="display:inline-block;border:1px solid black;padding:5px;font-size:32px;">
	<?php 
		echo "今日のラッキーナンバーは".rand(1,10)."です。";
	?>
</div>
<br />
<br />
<div style="display:inline-block;border:1px solid black;padding:5px;font-size:32px;">
	<?php 
		$lucky_number = rand(1,10);
		echo "今日のラッキーナンバーは{$lucky_number}です。";
		if($lucky_number==7){
			echo "<br />";
			echo "宝くじが当たるかもね！";
		}
	?>
</div>