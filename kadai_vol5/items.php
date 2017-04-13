<?php
	//DB接続
	$dsn  = "mysql:host=localhost;dbname=test";
	$user = "test";
	$password = "test";
	$db = new PDO($dsn,$user,$password);
	$db->exec("SET NAMES utf8");

	// テーブル作成用SQL
	$db->exec("CREATE TABLE IF NOT EXISTS images_table (
		id INTEGER PRIMARY KEY AUTO_INCREMENT,
		title TEXT,
		memo TEXT,
		file TEXT,
		flag TEXT,
		ctime INTEGER
	)");

	//------------------------------------------
	//画像を追加する
	if(isset($_POST['title'] ) && $_POST['title'] != ""){
		$file = ($_FILES['file']['name']);
		if($_FILES['file']['name']){
			move_uploaded_file($_FILES['file']['tmp_name'], 'img/'.$file);
		}
		$title = ($_POST['title']);
		$memo = ($_POST['memo']);
		$now = time();
		$db->exec("INSERT INTO images_table (title,memo,file,flag,ctime) VALUES ('$title','$memo','$file','new',$now)");
	}

	//リスト表示部分
	$list = "";
	$sql = "SELECT * FROM images_table WHERE flag = 'new' ORDER BY ctime DESC";
	$r = $db->query($sql);

	foreach($r->fetchAll() as $row){
		$id = $row["id"];
		$title = htmlspecialchars($row["title"]);
		$memo = htmlspecialchars($row["memo"]);
		$file = htmlspecialchars($row["file"]);
		$ctime = date("Y-m-d", $row["ctime"]);
		$list .= "<tr><th><img src='img/$file' width='300px' height='300' /></th><td>
		<p><label style='font-weight:bold;'>$title</label><br />(追加日： $ctime )</p>
		<p>$memo</p>
		</td></tr>";
	}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>新規登録画面</title>
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
		<div id="items">
			<h1>新しい画像</h1>
			<a href="/kadai_vol5/front.php">[公開ページを確認する→]</a>
			<div class="new">
				<form method="post" enctype="multipart/form-data">
					<p>タイトル：</p>
					<input type="text" name="title"><br />
					<p>説明：</p>
					<textarea rows="10" cols="60" name="memo"></textarea><br />
					<p>画像：</p>
					<input type="file" name="file" size="30" ><br />
					<p style="text-align:right;"><input type="submit" value="追加"></p><br />
				</form>		
			</div>
			<div class="list">
				 <?php if(!empty($_POST)): ?>
					<h1>画像リスト</h1>
					<table>
					<?php echo $list; ?>
					</table>
				<?php endif; ?>	
			</div>			
		</dir>
	</body>
</html>

