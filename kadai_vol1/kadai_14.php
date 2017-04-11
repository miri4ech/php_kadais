<?php 
	$imgs = array(
		'/kadai_vol1/img/kadai4/seiza1.png',
		'/kadai_vol1/img/kadai4/seiza2.png',
		'/kadai_vol1/img/kadai4/seiza3.png',
		'/kadai_vol1/img/kadai4/seiza4.png',
		'/kadai_vol1/img/kadai4/seiza5.png',
		'/kadai_vol1/img/kadai4/seiza6.png',
		'/kadai_vol1/img/kadai4/seiza7.png',
		'/kadai_vol1/img/kadai4/seiza8.png',
		'/kadai_vol1/img/kadai4/seiza9.png',
		'/kadai_vol1/img/kadai4/seiza10.png',
		'/kadai_vol1/img/kadai4/seiza11.png',
		'/kadai_vol1/img/kadai4/seiza12.png',
	);
	$index = rand(0,count($imgs)-1);
	$img_path = $imgs[$index];

?>
<img src="<?php echo $img_path; ?>"/>