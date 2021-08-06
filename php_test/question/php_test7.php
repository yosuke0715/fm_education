<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP7</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
</head>

<body>
    <header>
        <h1>PHP7【配列の結合】</h1>
    </header>
    <div class="test_area">
        <p class="ly_module_text">目標物</p>
        <p class="ly_module_text"><img src="./img/array.png" alt="配列"></p>
        <p class="ly_module_text">この下に表示させる</p>
        <p style="margin-left:40%;">
        <?php
        // 配列の中身を確認します。
        // 実務では配列の中に何が入っているかどうか確認するときによく使います。
        $customer_id_array = array(1,2,3);
        $customer_name_array = array("松本", "村田", "熊田");
        $customer_gender_array = array("男性", "女性", "その他");
        $customer_blood_type_array = array("A型", "O型", "AB型");
        // ここから処理を追加
        // $customer_array = ;

        //ここまで処理を書く
        ob_start();
        var_dump($customer_array);
        $content=ob_get_contents();
        ob_end_clean();
        print nl2br(htmlspecialchars($content));
        ?>
        </p>
    </div>
</body>

</html>