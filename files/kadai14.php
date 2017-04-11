<?php 
	$imgs = array(
		'/img/kadai4/seiza1.png',
		'/img/kadai4/seiza2.png',
		'/img/kadai4/seiza3.png',
		'/img/kadai4/seiza4.png',
		'/img/kadai4/seiza5.png',
		'/img/kadai4/seiza6.png',
		'/img/kadai4/seiza7.png',
		'/img/kadai4/seiza8.png',
		'/img/kadai4/seiza9.png',
		'/img/kadai4/seiza10.png',
		'/img/kadai4/seiza11.png',
		'/img/kadai4/seiza12.png',
	);
	$index = rand(0,count($imgs)-1);
	$img_path = $imgs[$index];

?>
<img src="<?php echo $img_path; ?>"/>