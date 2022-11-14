$(function () {
    $('.card-wrapper').click(function (e) {
        e.preventDefault();
        $(this).children().first().children('form').first().trigger('submit');
    });

    // $('form').click(function (e) {
    //     e.preventDefault();
    //     $(this).trigger('submit');
    // });
});