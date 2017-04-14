<?php  
    //DB接続
    $dsn  = "mysql:host=localhost;dbname=test";
    $user = "test";
    $password = "test";
    $db = new PDO($dsn,$user,$password);
    $db->exec("SET NAMES utf8");

    //データ挿入
    $name_data  = $_POST['name'];
    $email_data = $_POST['email'];
    $insert_query = "INSERT INTO users (name,email) VALUES ('$name_data','$email_data')";
    $db->exec($insert_query);

    //データ抽出
    $result = $db->query("SELECT * from users ORDER BY id desc")->fetchAll();
    echo "<pre>";
    print_r($result);
    echo "</pre>";
?>