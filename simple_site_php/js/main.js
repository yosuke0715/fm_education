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