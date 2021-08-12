<?php
try {
    /*DBへ接続*/
    $host = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'php_memo';

    $dbh = new PDO("mysql:host=localhost; dbname=$dbName; charset=utf8", $username, $password);
    // テーブルの名前
    $tableName = "comments";

    /*table作製のSQL*/
    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        comment VARCHAR(200),
        regi_date DATETIME
	) engine=innodb default charset=utf8";

    /*SQL実行*/
    $result = $dbh->query($sql);

    //コメントの内容をDBに追加する
    if (isset($_POST["comment"])) {

        /*入力文字数制限*/
        $comment = $_POST["comment"];
        $date = date("Y/m/d H:i:s");

        /*書き込み*/
        $sql = "INSERT INTO $tableName(
            comment,regi_date
        )VALUES(
            :comment,now()
        )";

        /*bindValue関数でバインドする*/
        $result = $dbh->prepare($sql);
        $result->bindValue(':comment', $comment, PDO::PARAM_STR);
        $result->execute();
    }

    //コメントをDBから削除する
    if (!empty($_POST["del_num"])) {
        $deleleTargetId = $_POST["del_num"];
        $sql = "DELETE FROM $tableName WHERE id=$deleleTargetId";
        $result = $dbh->prepare($sql);
        $result->execute();
    }

    //コメントを編集する
    if (!empty($_POST["edit_comment"])) {
        $editTargetId = $_POST["edit_num"];
        $editComment = $_POST["edit_comment"];

        /*パスワードが一一致したときのみ内容を変更する*/
        $sql = "UPDATE $tableName SET comment=:comment,regi_date=now() WHERE id=:id";
        $result = $dbh->prepare($sql);
        $result->bindValue(':comment', $editComment, PDO::PARAM_STR);
        $result->bindValue(':id', $editTargetId, PDO::PARAM_STR);
        $result->execute();

    }

} catch (PDOException $e) {

    echo $e->getMessage();
    die();
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シンプルメモ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>シンプルメモ</h1>
    </header>
    <main>
        <div class="flex mt-5">
            <div class="add_area">
                <h2 class="memo_title">メモ入力</h2>
                <form action="#" method="post">
                    <input type="text" name="comment">
                    <input type="submit" value="追加する" class="submit_btn">
                </form>
            </div>
            <div class="memo_area">
                <?php
                /*MySQL情報*/
                $host = 'localhost';
                $username = 'root';
                $password = 'root';
                $dbName = 'php_memo';

                $dbh = new PDO("mysql:host=localhost; dbname=$dbName; charset=utf8", $username, $password);

                /*テーブル内の情報を表示*/
                $sql = "SELECT * FROM $tableName";
                $result = $dbh->query($sql);?>
                <div class="card_area">
                    <?php foreach ($result as $loop): ?>
                    <div class="card_item">
                        <p><?php echo $loop['comment']; ?></p>
                        <form action="#" method="post" class="del_form">
                            <input type="submit" value="×" class="del_btn">
                            <input type="hidden" name="del_num" value="<?php echo $loop["id"]; ?>">
                        </form>
                        <form action="edit.php" method="post">
                            <input type="submit" value="編集する" class="edit_btn">
                            <input type="hidden" name="edit_num" value="<?php echo $loop["id"]; ?>">
                        </form>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </main>

</body>

</html>