$(function () {
    let next = $('#next');
    let back = $('#back');

    let currentDiv = 1;

    next.click(function (e) {
        e.preventDefault();

        if (currentDiv == 1) {
            back.removeClass('d-none');
            back.parent().removeClass('justify-content-end');
            back.parent().addClass('justify-content-between');
        } else if (currentDiv == 4) {
            next.text('Submit');
        } else if (currentDiv == 5) {
            $('form').submit();
        }


        $(`.cv-info-${currentDiv}`).animate({
            width: 0,
            opacity: 0
        }, 1000, function () {
            $(`.cv-info-${currentDiv++}`).hide();
            $(`.cv-info-${currentDiv}`).show();
            $(`.cv-info-${currentDiv}`).animate({
                width: '100%',
                opacity: 1
            }, 1000);
        });
    });

    back.click(function (e) {
        e.preventDefault();

        if (currentDiv == 2) {
            back.addClass('d-none');
            back.parent().addClass('justify-content-end');
            back.parent().removeClass('justify-content-between');
        } else if (currentDiv == 5) {
            next.removeClass('d-none');
            next.text('Next');
        }

        $(`.cv-info-${currentDiv}`).animate({
            width: 0,
            opacity: 0
        }, 1000, function () {
            $(`.cv-info-${currentDiv--}`).hide();
            $(`.cv-info-${currentDiv}`).show();
            $(`.cv-info-${currentDiv}`).animate({
                width: '100%',
                opacity: 1
            }, 1000);
        });
    });
});