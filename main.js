function _(ele) {
    return document.querySelector(ele);
}

// alert(window.innerWidth);

$(document).ready(function () {
    $(".hamburger").click(function () {
        $(this).toggleClass("is-active");
        _('body').classList.toggle("show-sn");
    });
});
