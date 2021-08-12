<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP2</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <header>
        <h1>PHP2【電話番号からハイフンを取り除く】</h1>
    </header>
    <div class="test_area">
        <p class="ly_module_text">例) 090-1234-5678 → 09012345678</p>
        <form action="#" method="post">
            <input type="text" name="text" id="text">
            <input type="submit" class="btn" value="送信する">
        </form>
        <p class="ly_module_text">
        <?php
        // inputに入力された電話番号からハイフンがあれば取り除こう
        // 例) 090-1111-1111 → 09011111111 にする
        // ここから処理を追加
        $replaceData = preg_replace("/-/", "", $_POST["text"]);
        echo $replaceData;
        ?>
        </p>
    </div>
</body>
</html>