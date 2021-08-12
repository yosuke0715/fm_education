<?php
    $errors = [];
    function check($post){
        return htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
    }
    if (isset($_POST)) {
        // 氏名
        if (empty($_POST['name'])) {
            $errors[] = '氏名は必須項目です。';
        }
        // メール
        if (empty($_POST['mail'])) {
            $errors[] = 'Eメールは必須項目です。';
        } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = '正しいEメールアドレスを指定してください。';
        }
        // 電話番号
        if (empty($_POST['tel'])) {
            $errors[] = '電話番号を入力してください。';
        }

        // お問い合わせ内容
        if (empty($_POST['content'])) {
            $errors[] = 'お問い合わせ内容は必須項目です。';
        } 
        if (empty($errors)){
            $NAME = check($_POST["name"]);
            $MAIL = check($_POST["mail"]);
            $TEL = check($_POST["tel"]);
            $CONTENT = check($_POST["content"]);
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ススー'サイト</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="container flex between">
            <div class="header_left">
                <h1 class="main_title">ススー</h1>
            </div>
            <div class="header_right">
                <ul class="header_nav">
                    <li class="header_nav_item">
                        <a href="#top">トップ</a>
                    </li>
                    <li class="header_nav_item">
                        <a href="#profile">プロフィール</a>
                    </li>
                    <li class="header_nav_item">
                        <a href="#skill">スキル</a>
                    </li>
                    <li class="header_nav_item">
                        <a href="#contact">お問い合わせ</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <section id="top">
            <div class="container flex">
                <div class="top_img">
                    <img src="./img/top.png" alt="">
                </div>
                <div class="top_text">
                    <h2>クラウドの無駄よ、<br>さようなら</h2>
                </div>
            </div>
        </section>
        <section id="profile">
            <div class="container">
                <h2 class="section_title">プロフィール</h2>
                <div class="flex around">
                    <div class="profile_img">
                        <img src="./img/office_station.png" alt="ススー">
                    </div>
                    <div class="profile_text">
                        <table>
                            <tbody>
                                <tr>
                                    <td>名前：</td>
                                    <td>ススー</td>
                                </tr>
                                <tr>
                                    <td>種族：</td>
                                    <td>ペンギン</td>
                                </tr>
                                <tr>
                                    <td>所属：</td>
                                    <td>オフィスステーション</td>
                                </tr>
                                <tr>
                                    <td>好きな言葉：</td>
                                    <td>クラウドの無駄よ、さようなら</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <section id="skill">
            <div class="container">
                <h2 class="section_title">スキル</h2>
                <div class="card_area">
                    <div class="card_item">
                        <h3 class="card_title">HTML&CSS</h3>
                        <img src="./img/html&css.png" alt="">
                        <div class="card_text">
                            <p>簡単な静的サイトを作成することができます。</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <h3 class="card_title">JavaScript</h3>
                        <img src="./img/js.png" alt="">
                        <div class="card_text">
                            <p>動的サイトを作ることができます。</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <h3 class="card_title">PHP</h3>
                        <img src="./img/php.svg" alt="">
                        <div class="card_text">
                            <p>サーバー上で動く言語でお問い合わせなどに用いられます。</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <h3 class="card_title">SQL</h3>
                        <img src="./img/sql.jpeg" alt="">
                        <div class="card_text">
                            <p>お問い合わせ内容を保存するデータベースです。</p>
                        </div>
                    </div>
                    <div class="card_item">
                        <h3 class="card_title">Laravel</h3>
                        <img src="./img/laravel.png" alt="">
                        <div class="card_text">
                            <p>PHPで最も人気なフレームワークです。</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="contact">
            <div class="container">
                <h2 class="section_title">お問い合わせ</h2>
                <input class="contact_btn" id="contact_btn" type="button" value="お問い合わせをする">
                <div id="form_area" class="form_area display_none">
                    <form action="#" method="POST" id="form" name="form">
                        <span>・お名前</span><br>
                        <p id="name_error" class="display_none red">名前は必須です。</p>
                        <input type="text" name="name" id="name" placeholder="ススー"><br>
                        <span>・メールアドレス</span><br>
                        <p id="mail_error" class="display_none red">メールアドレスは必須です。</p>
                        <input type="text" name="mail" id="mail" placeholder="sample@gmail.com"><br>
                        <span>・電話番号</span><br>
                        <p id="tel_error" class="display_none red">電話番号は必須です。</p>
                        <input type="text" name="tel" id="tel" placeholder="080-1111-2222"><br>
                        <span>・お問い合わせ内容</span><br>
                        <p id="content_error" class="display_none red">お問い合わせ内容は必須です。</p>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea><br>
                        <button id="submit_btn">送信する</button>
                    </form>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="contact_content" style="text-align:center; margin:40px auto;font-size:26px;">
                    <?php if (!empty($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $message): ?>
                        <li style="color:red;"><?php echo $message; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php endif; ?>
                    <p>取得したお問い合わせ内容</p>
                    <p>お名前：<?php echo $NAME; ?></p>
                    <p>メールアドレス：<?php echo $MAIL; ?></p>
                    <p>電話番号：<?php echo $TEL; ?></p>
                    <p>お問い合わせ内容：<?php echo $CONTENT; ?></p>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="container">
            <h3 class="footer_title">ススー'サイト</h3>
            <div class="flex around">
                <div class="footer_bottom">
                    <ul class="footer_nav">
                        <li class="footer_nav_item">
                            <a href="#top">トップ</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#profile">プロフィール</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#skill">スキル</a>
                        </li>
                        <li class="footer_nav_item">
                            <a href="#contact">お問い合わせ</a>
                        </li>
                    </ul>
                </div>
                <div id="footer_img" class="footer_img">
                    <img src="./img/office.png" alt="オフィスステーション">
                </div>
            </div>
            <p class="copyright">&copy; 2021 ススー</p>
        </div>
    </footer>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/main.js"></script>
</body>

</html>