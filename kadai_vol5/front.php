<?php
   //DB接続
   $dsn  = "mysql:host=localhost;dbname=test";
   $user = "test";
   $password = "test";
   $db = new PDO($dsn,$user,$password);
   $db->exec("SET NAMES utf8");
   
   //リスト表示部分
   $list = "";
   $content = "";
   $sql = "SELECT * FROM images_table WHERE flag = 'new' ORDER BY ctime DESC LIMIT 4";
   $r = $db->query($sql);

   $i = 1;
   foreach($r->fetchAll() as $row){
      $title = htmlspecialchars($row["title"]);
      $memo = htmlspecialchars($row["memo"]);
      $file = htmlspecialchars($row["file"]);
      $ctime = date("Y-m-d", $row["ctime"]);
      $li = "";
      $div = "";
      if($i == 1){
         $li = "<li class='ui-tabs-nav-item ui-tabs-selected' id='nav-fragment-$i'>";
         $div = "<div id='fragment-$i' class='ui-tabs-panel' style=''>";
      }else{
         $li = "<li class='ui-tabs-nav-item' id='nav-fragment-$i'>";
         $div = "<div id='fragment-$i' class='ui-tabs-panel ui-tabs-hide' style=''>";
      }
      $list .= $li
      ."<a href='#fragment-$i'>"
      ."<img src='img/$file' alt=''/>"
      ."<span>$title</span>"
      ."</a>"
      ."</li>";
      $content .= $div
      ."<img src='img/$file' alt=''/>"
      ."<div class='info'>"
      ."<p>$ctime</p>"
      ."<p>$title</p>"
      ."<p>$memo</p>"
      ."</div></div>";
      $i++;
   }

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta http-equiv="Content-Language" content="ja" />
      <meta http-equiv="Content-Script-Type" content="text/javascript" />
      <meta http-equiv="Content-Style-Type" content="text/css" />
      <meta http-equiv="imagetoolbar" content="no" />
       <title>画像日記(最近の活動)</title>
      <link href="custom.css" rel="stylesheet" type="text/css">
      <!-- JS -->
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>
      <script type="text/javascript">
         $(function(){
            $("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
         });
      </script>
      <!-- CSS -->
      <style media="screen,projection" type="text/css">
      :focus {
         outline:none;
      }
         #featured{ 
            width:400px; height:400px;
            padding-right:300px;
            position:relative;
            border:5px solid #ccc;
            line-height:1;
            background:#fff;
         }
         #featured ul.ui-tabs-nav{ 
            position:absolute;
            top:0; left:400px;
            list-style:none;
            margin:0; padding:0;
            width:300px;
         }
         #featured ul.ui-tabs-nav li{ 
            padding:1px 0 1px 13px;
            font-size:12px;
            color:#666;
         }
         #featured ul.ui-tabs-nav li img{ 
            width:80px; height:80px;
            float:left;
            margin:2px 5px; padding:2px;
            background:#fff;
            border:1px solid #eee;
         }
         #featured ul.ui-tabs-nav li span{ 
            font-size:11px;
            line-height:18px;
         }
         #featured li.ui-tabs-nav-item a{ 
            display:block;
            height:90px;
            color:#333;
            background:#fff;
            line-height:20px;
            margin-right:10px;
         }
         #featured li.ui-tabs-nav-item a:hover{ 
            background:#f2f2f2;
         }
         #featured li.ui-tabs-selected{ 
            background:url('img/featured_content_slider/selected-item.gif') top left no-repeat;
         }
         #featured ul.ui-tabs-nav li.ui-tabs-selected a{ 
            background:#ccc;
         }
         #featured .ui-tabs-panel{ 
            width:400px; height:400px;
            background:#999;
            position:relative;
         }
         #featured .ui-tabs-panel img {
            width:400px; height:400px;
         }
         #featured .ui-tabs-panel .info{ 
            position:absolute;
            bottom:0; left:0;
            height:100px;
            width: 100%;
            background: url('img/featured_content_slider/transparent-bg.png');
         }
         #featured .info h2{ 
            font-size:13px;
            margin:10px;
            color:#fff;
            overflow:hidden;
         }
         #featured .info p{
            margin:10px;
            font-size:11px;
            line-height:15px;
            color:#f0f0f0;
         }
         #featured .info a{
            text-decoration:none;
            color:#fff;
         }
         #featured .info a:hover{
            text-decoration:underline;
         }
         #featured .ui-tabs-hide{
            display:none;
         }
       </style>
   </head>
   <body>
      <div id="wrap">
         <h1>画像日記(最近の活動)</h1>
         <a href="/kadai_vol5/index.php">[ログイン画面→]</a>
<!-- CODE -->
         <div id="featured" >
            <ul class="ui-tabs-nav">
            <?php echo $list; ?>
            </ul>
   <!-- content -->
            <?php echo $content; ?>
   <!-- / content -->
         </div>
<!-- / CODE -->
      </div>
   </body>
</html>