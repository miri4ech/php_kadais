<?php
    if(!empty($_POST)){
        //バリデーション
        if($_POST['id'] == 'user' && $_POST['pass'] == 'pass'){
            $validate['login'] = 'OK';
        }else{
            $validate['login'] = 'NG';
        }

        if($validate['login'] == 'OK'){
            header('Location: http://local-tasks.com/kadai_vol5/items.php');
            exit();
        }else if($validate['login'] == 'NG'){
            header('Location: http://local-tasks.com/kadai_vol5/error.html');
            exit();      
        }
    }
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>ログイン</title>
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
		<div id="login">
			<h1>画像管理システム</h1>
			<form method="post">
				<p><input type="text" name="id" placeholder="ログインID" /></p>
				<p><input type="password" name="pass" placeholder="パスワード" /></p>
				注）半角英数で入力してください
				<p style="text-align:right;"><input type="submit" value="ログイン" /></p>
			</form>			
		</div>
	</body>
</html>

