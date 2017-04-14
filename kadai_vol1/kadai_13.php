<?php 
	$msg = array(
		'how are you?',
		'what do you want to study?',
		'Why do you like this web page?'
	);
	$index = rand(0,count($msg)-1);
	echo $msg[$index];