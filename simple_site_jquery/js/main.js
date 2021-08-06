$("#contact_btn").click(function() {
    if ($(".form_area").hasClass("display_none")) {
        $(".form_area").removeClass("display_none");
    } else {
        $(".form_area").addClass("display_none");
    }
})

$("#footer_img").click(function() {
    const URL = "https://www.officestation.jp/";
    window.location.href = URL;
})


//form バリデーション
$("#submit_btn").click(function(e) {
    e.preventDefault();
    const name = $("#name");
    const mail = $("#mail");
    const tel = $("#tel");
    const content = $("#content");

    //正規表現（あえてアラートで）
    const reg = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;

    const tel_without_hyphen = tel.val().replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi, '');


    if (name.val() == "") {
        $("#name_error").removeClass("display_none");
    }
    if (mail.val() == "") {
        $("#mail_error").removeClass("display_none");
    } else if (!reg.test(mail)) {
        window.alert("メールアドレスの形式が違います");
    }
    if (tel.val() == "") {
        $("#tel_error").removeClass("display_none");
    } else if (!tel_without_hyphen.match(/^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/)) {
        window.alert("電話番号の形式が異なります");
    }
    if (content.val() == "") {
        $("#content_error").removeClass("display_none");
    }
})