jQuery(document).ready(function ($) {
    $(".nas-alert").removeClass("hidden").animate({ right: '50px', opacity: 1 }, 500);

    setTimeout(function () {
        $(".nas-alert").animate({ right: '-250px', opacity: 0 }, 500, function () {
            $(this).addClass("hide");
        });
    }, 5000);

    $(".nas-alert .close").on("click", function () {
        $(this)
            .parent(".nas-alert")
            .animate({ right: '-250px', opacity: 0 }, 300, function () {
                $(this).addClass("hide");
            });
    });

    $(".nas-alert").on("transitionend", function () {
        if ($(this).hasClass("hide")) {
            $(this).remove();
        }
    });
});
