<?php
	//DB接続
	$dsn  = "mysql:host=localhost;dbname=test";
	$user = "test";
	$password = "test";
	$db = new PDO($dsn,$user,$password);
	$db->exec("SET NAMES utf8");

/*-- 追加 --*/
	// テーブル作成用SQL
	$db->exec("CREATE TABLE IF NOT EXISTS items2 (todo_id INTEGER PRIMARY KEY AUTO_INCREMENT,memo TEXT,level TEXT,flag TEXT,ctime INTEGER)");
/*-- 追加 fin --*/

	//------------------------------------------
	//TODOを追加する
	if(isset($_POST['newitem'] ) && $_POST['newitem'] != ""){
		$level = ($_POST['level']);
		$memo = ($_POST['newitem']);
		$now = time();
		$db->exec("INSERT INTO items2 (level,memo,flag,ctime) VALUES ('$level','$memo','new',$now)");
	}

	//TODOを消化する
	$todo_id = intval($_GET['done']);
	if ($todo_id > 0){
		$db->exec("UPDATE items2 SET flag = 'done' WHERE todo_id = $todo_id");
	}

	//------------------------------------------
	//現在のTODOを表示するHTMLを作る
	$list = "";

	//未消化のTODOを抽出する
	$sql = "SELECT * FROM items2 WHERE flag = 'new' ORDER BY level DESC,ctime DESC";
	$r = $db->query($sql);

	foreach($r->fetchAll() as $row){
		$todo_id = $row["todo_id"];
		$level = htmlspecialchars($row["level"]);
		$memo = htmlspecialchars($row["memo"]);
		$ctime = date("Y-m-d H:i", $row["ctime"]);
		$btn = "[<a style='color:red;' href='?done=$todo_id'>完了</a>]";
		$list .= "<li>$btn $level : $memo ($ctime)</li>";
	}

	//消化済みのTODOを表示
	$sql = "SELECT * FROM items2 WHERE flag = 'done' ORDER BY ctime DESC LIMIT 5";
	$r = $db->query($sql);
	foreach($r->fetchAll() as $row){
		$level = htmlspecialchars($row["level"]);
		$memo = htmlspecialchars($row["memo"]);
		$ctime = date("Y-m-d H:i", $row["ctime"]);
		$list .= "<li><s>$level:$memo ($ctime)</s></li>";
	}

	//二重投稿防止
	if($_SERVER['REQUEST_METHOD']==='POST'){
		//kunisadaのlocalhostの設定
		header('Location:http://local-tasks.com/kadai_vol4/todo_mysql2.php');	
	}
?>

<html>
	<body>
		<h1>TODO 一覧</h1>
			<ul style="list-style:none;padding:10px;">
				<?php echo $list; ?>
			</ul>
		<form method="POST">
			<h3>新しいTODOを追加</h3>
			<select name="level">
				<option value="Level1" selected>Level1</option>
				<option value="Level2">Level2</option>
				<option value="Level3">Level3</option>
				<option value="Level4">Level4</option>
				<option value="Level5">Level5</option>
			</select>
			<input type="text" name="newitem" />
			<input type="submit" value="追加" />
		</form>
	</body>
</html>
