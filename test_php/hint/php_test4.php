<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP4</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <header>
        <h1>PHP4【配列の中身を表示させる】</h1>
    </header>
    <div class="test_area">
        <p class="ly_module_text">例)array(5) { ["りんご"]=> int(100) ["ぶどう"]=> int(500) ["メロン"]=> int(3000) ["バナナ"]=> int(200) ["レモン"]=> int(120) }</p>
        <p class="ly_module_text">この下に表示させる</p>
        <p class="ly_module_text">
        <?php
        // 配列の中身を確認します。
        // 実務では配列の中に何が入っているかどうか確認するときによく使います。
        // ヒント　var_dumpについて調べよう
        $array = array(
            'りんご' => 100,
            'ぶどう' => 500,
            'メロン' => 3000,
            'バナナ' => 200,
            'レモン' => 120
        );
        // ここから処理を追加
        


        
        ?>
        </p>
    </div>
</body>
</html>