<?php 
	$ary = array(
		"one" 	=> 1,
		"two" 	=> 2,
		"three" => 3,
		"four" 	=> 4,
		"five" 	=> 5,
		"six"	=> 6,
		"seven" => 7,
		"eight" => 8,
		"nine" 	=> 9,
		"ten" 	=> 10
	);
	foreach ($ary as $key => &$val) {
		if($val%3 == 0){
			switch ($val) {
				case 3:
					$val = "さぁ〜ん";
					break;
				case 6:
					$val = "ろくぅ〜";
					break;
				case 9:
					$val = "きゅ〜う";
					break;
			}
		}
		echo "英語の{$key}は、「{$val}」";
		echo "<br />";
	}
	unset($val);
?>