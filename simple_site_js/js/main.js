document.getElementById("contact_btn").onclick = function() {
    const get_class_name = document.getElementById("form_area");
    if (get_class_name.classList.contains("display_none")) {
        get_class_name.classList.remove("display_none");
    } else {
        get_class_name.classList.add("display_none");
    }
}

document.getElementById("footer_img").onclick = function() {
    const URL = "https://www.officestation.jp/";
    window.location.href = URL;
}


//form バリデーション
document.getElementById("submit_btn").onclick = function(e) {
    e.preventDefault();
    // const form = document.getElementsById("form");
    const name = document.getElementById("name");
    const mail = document.getElementById("mail");
    const tel = document.getElementById("tel");
    const content = document.getElementById("content");

    //正規表現（あえてアラートで）
    const reg = /^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/;

    const tel_without_hyphen = tel.value.replace(/[━.*‐.*―.*－.*\-.*ー.*\-]/gi, '');


    if (name.value == "") {
        document.getElementById("name_error").classList.remove("display_none");
    }
    if (mail.value == "") {
        document.getElementById("mail_error").classList.remove("display_none");
    } else if (!reg.test(mail)) {
        window.alert("メールアドレスの形式が違います");
    }
    if (tel.value == "") {
        document.getElementById("tel_error").classList.remove("display_none");
    } else if (!tel_without_hyphen.match(/^(0[5-9]0[0-9]{8}|0[1-9][1-9][0-9]{7})$/)) {
        window.alert("電話番号の形式が異なります");
    }
    if (content.value == "") {
        document.getElementById("content_error").classList.remove("display_none");
    }
}