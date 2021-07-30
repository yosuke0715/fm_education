const LOCALHOST_URL = 'http://localhost:8888/laravel/original_memo/memo/public';

$('.del_btn').click(function() {
    if (window.confirm('本当に削除しますか？')) {
        const comment_id = $(this).prev('input:hidden[name="comment_id"]').val();
        $url = LOCALHOST_URL + '/delete/' + comment_id;
        $location = window.location.href = $url;
        return $location;
    } else {
        window.alert('キャンセルされました');

    }
})

$('.edi_btn').click(function() {
    const comment_id = $(this).next('input:hidden[name="comment_id"]').val();
    $url = LOCALHOST_URL + '/edit/' + comment_id;
    $location = window.location.href = $url;
    return $location;
})

$('.history_add_btn').click(function() {
    const comment_id = $(this).prev('input:hidden[name="comment_id"]').val();
    $url = LOCALHOST_URL + '/history/add/' + comment_id;
    $location = window.location.href = $url;
    return $location;
})

$('.all_delete').click(function() {
    if (window.confirm('本当に削除しますか？')) {
        $url = LOCALHOST_URL + '/all_delete';
        $location = window.location.href = $url;
        return $location;
    } else {
        window.alert('キャンセルされました');
    }
})

$('.img_btn').click(function() {
    $url = LOCALHOST_URL + '/image';
    $location = window.location.href = $url;
    return $location;
})

$('.history_btn').click(function() {
    $url = LOCALHOST_URL + '/history';
    $location = window.location.href = $url;
    return $location;
})

$('.back_btn').click(function() {
    $url = LOCALHOST_URL + '/home';
    $location = window.location.href = $url;
    return $location;
})

$(".sort_btn").click(function() {
    if ($('.sort_area').hasClass("display_none")) {
        $('.sort_area').removeClass("display_none");
    } else {
        $('.sort_area').addClass("display_none");
    }
});

function check() {
    let comment = document.comment_form.comment.value;
    if (comment === "") {
        alert("メモ内容を入力してください！");
        return false;
    }
    return true;
}

function checkEdit() {
    let comment = document.edit_form.comment.value;
    if (comment === "") {
        alert("メモ内容を入力してください！");
        return false;
    }
    return true;
}

//おみくじ

$(function() {
    function omikuji() {
        const cont = Math.ceil(Math.random() * 4);
        if (cont == 1) {
            $(".omikuji_name").html("大吉が出ました");
            $(".omikuji_text").html("おめでとう！今日は何をしても大成功！知らんけど");
        }
        if (cont == 2) {
            $(".omikuji_name").html("中吉が出ました");
            $(".omikuji_text").html("いいんじゃない！大吉までもう一歩");
        }
        if (cont == 3) {
            $(".omikuji_name").html("小吉が出ました");
            $(".omikuji_text").html("中途半端やねえ。凶よりましか");
        }
        if (cont == 4) {
            $(".omikuji_name").html("吉が出ました");
            $(".omikuji_text").html("実は２番目にいい運勢って知ってた？おめでとう");
        }
        if (cont == 5) {
            $(".omikuji_name").html("凶が出ました");
            $(".omikuji_text").html("どんまい気にしない。もう一回ボタン押しとく？");
        }
    }


    $(".omikuji_btn").on("click", function() {
        omikuji();
    });
});