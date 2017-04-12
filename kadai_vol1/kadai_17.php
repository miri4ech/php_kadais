<form method="post">
	<input type="text" name="figure1">
	<select name="culc">
		<option value="1">＋</option>
		<option value="2">−</option>
		<option value="3">÷</option>
		<option value="4">×</option>
	</select>
	<input type="text" name="figure2"> = ?
	<br />
	<input type="submit" value="計算">
</form>

<?php
	$fig1 = $_POST['figure1'];
	$fig2 = $_POST['figure2'];
	$culc = $_POST['culc'];
	switch ($culc) {
		case 1:
			$operator = "＋";
			$result = $fig1+$fig2;
			break;
		case 2:
			$operator = "−";
			$result = $fig1-$fig2;
			break;
		case 3:
			$operator = "÷";
			if ($fig2 == 0){
				$result = "ゼロ除算"; 
			}else{
				$result = $fig1/$fig2;
			}
			break;
		case 4:
			$operator = "×";
			$result = $fig1*$fig2;
			break;
	}

	if($fig1!=null&&$fig2!=null){
		echo "結果： $fig1 $operator $fig2 = $result";
	}