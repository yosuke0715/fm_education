<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP3</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
</head>

<body>
    <header>
        <h1>PHP3【if文練習】</h1>
    </header>
    <div class="test_area">
        <p class="ly_module_text">この下に表示させる</p>
        <p class="ly_module_text">
        <?php
        // if文練習
        // 1~50の数字が３の倍数５の倍数７の倍数の時
        // 例) 6は３の倍数です。のように表示させる　
        // 例) 15は3と5の倍数ですのように表示させる
        // ここから処理を追加
        for($i = 1; $i <= 50; $i++){
            if($i % 3 === 0){
                if($i % 5 === 0){
                    echo "$i は3と5の倍数です<br>";
                }elseif($i % 7 === 0){
                    echo "$i は3と7の倍数です<br>";
                }else{
                    echo "$i は３の倍数です<br>";
                }
            } elseif($i % 5 === 0){
                if($i % 7 === 0){
                    echo "$i は5と7の倍数です<br>";
                }else{
                    echo "$i は5の倍数です<br>";
                }
            } elseif($i % 7 === 0){
                echo "$i は7の倍数です<br>";
            }else{
                echo "$i<br>";
            }
        }
        ?>
        </p>
    </div>
</body>

</html>