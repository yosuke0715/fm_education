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
    $editTargetId = $_POST["edit_num"];
    $sql = "SELECT * FROM $tableName WHERE id=$editTargetId";
    $result = $dbh->query($sql);

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
    <title>編集ページ</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="add_area" style="margin:auto;">
        <h2 class="memo_title">メモ編集ページ</h2>
        <?php foreach ($result as $loop): ?>
        <form action="index.php" method="post">
            <input type="hidden" name="edit_num" value="<?php echo $loop["id"]; ?>">
            <input type="text" name="edit_comment" value="<?php echo $loop["comment"]; ?>">
            <input type="submit" value="追加する" class="submit_btn">
        </form>
        <?php endforeach; ?>
    </div>
</body>

</html>