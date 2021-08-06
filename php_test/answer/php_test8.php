<?php
    $customer_id_array = array(1,2,3);
    $customer_name_array = array("松本", "村田", "熊田");
    $customer_gender_array = array("男性", "女性", "その他");
    $customer_blood_type_array = array("A型", "O型", "AB型");
    $customer_array = [];
    $count = count($customer_id_array);
    for ($i = 0; $i < $count; $i++){
        $customer_array[$i]["id"] = $customer_id_array[$i];
        $customer_array[$i]["name"] = $customer_name_array[$i];
        $customer_array[$i]["gender"] = $customer_gender_array[$i];
        $customer_array[$i]["blood_type"] = $customer_blood_type_array[$i];
    }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP8</title>
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
    <style>
        .array_list_item{
            background-color:#eee;
            padding:30px 50px;
            width:300px;
            border-radius:10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>PHP8【foreachを扱う】</h1>
    </header>
    <div class="test_area">
        <p class="ly_module_text">この下に表示させる</p>
        <ul class="array_list flex">
            <?php foreach($customer_array as $key => $value): ?>
                <li class="array_list_item">
                    <div class="item_id">顧客No：<?php echo $value["id"]; ?></div>
                    <div class="item_title">名前：<?php echo $value["name"]; ?></div>
                    <div class="item_gender">性別：<?php echo $value["gender"]; ?></div>
                    <div class="blood_type">血液型：<?php echo $value["blood_type"]; ?></div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>