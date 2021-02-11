<!DOCTYPE heml>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
<?php

mb_internal_encoding("utf8");
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;", "root", "");
$stmt = $pdo->query("select * from 4each_keijiban");

?>
    <header>
        <img src="4eachblog_logo.jpg">
        <ul class="menu">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>
    
    <main>
        <div class="left">
            <h1>プログラミングに役立つ掲示板</h1>
            
            <div class="formBox">
                <h2>入力フォーム</h2>
                <form method="post" action="insert.php">
                <label>ハンドルネーム</label>
                <br>
                <input type="text" size="50"  name="handlename">
                <br> 
                <label>タイトル</label>
                <br>
                <input type="text" size="50"  name="title">
                <br>
                <label>コメント</label>
                <br>
                <textarea rows="5" cols="50" name="comments"></textarea>
                <br>
                <input type="submit" class="submit" value="投稿する">
            </div>
            
            <?php
            
            while ($row = $stmt->fetch()) {
            
                echo "<div class='commentBox'>";
                echo "<h2>".$row['title']."</h2>";
                echo $row['comments'];
                echo "<p class='tokosya'>posted by ".$row['handlename']."</p>";
                echo "</div>";
            }
                
            ?>
                
        </div>
                
        <div class="right">
            <h2>人気の記事</h2>
            <ul>
                <li>PHPオススメ本</li>
                <li>PHP MyAdminの使い方</li>
                <li>いま人気のエディタTop5</li>
                <li>HTMLの基礎</li>
            </ul>
            <h2 class="listTitle">オススメリンク</h2>
            <ul>
                <li>インターノウス株式会社</li>
                <li>XAMPPのダウンロード</li>
                <li>Eclipseのダウンロード</li>
                <li>Braketのダウンロード</li>
            </ul>
            <h2 class="listTitle">カテゴリ</h2>
            <ul>
                <li>HTML</li>
                <li>PHP</li>
                <li>MySQL</li>
                <li>JavaScript</li>
            </ul>
        </div>
    </main>
        
    <footer>
	    <p>copyright&copy;internous | 4each blog the which provides A to Z about programming.</p>
	</footer>
</body>
</html>