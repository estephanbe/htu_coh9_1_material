$(function () {
    const next = $('#next');
    const back = $('#back');

    const eduBtn = $('#eduBtn');
    const workingBtn = $('#workingBtn');

    let currentDiv = 1;
    let eduCounter = 1;
    let workingCounter = 1;

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

        $(`.cv-info-${currentDiv} *`).hide('slow');
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
            $(`.cv-info-${currentDiv} *`).show();
            $(`.cv-info-${currentDiv}`).show();
            $(`.cv-info-${currentDiv}`).animate({
                width: '100%',
                opacity: 1
            }, 1000);
        });
    });

    eduBtn.click(function (e) {
        e.preventDefault();
        eduCounter++;
        // if (eduCounter > 5) {
        //     return;
        // }
        $('#education-section').append(`
            <div class="mb-3">
                <label for="institute-${eduCounter}" class="form-label">Institute</label>
                <input type="text" class="form-control" id="institute-${eduCounter}" name="institute[]">
            </div>
            <div class="mb-3">
                <label for="gdate-${eduCounter}" class="form-label">Graduation Date</label>
                <input type="date" class="form-control" id="gdate-${eduCounter}" name="gdate[]">
            </div>
        `);
    });

    workingBtn.click(function (e) {
        e.preventDefault();
        workingCounter++;
        // if (workingCounter > 5) {
        //     return;
        // }
        $('#working-experience-section').append(`
            <div class="mb-3">
                <label for="company-${workingCounter}" class="form-label">Company</label>
                <input type="text" class="form-control" id="company-${workingCounter}" name="company[]">
            </div>
            <div class="mb-3">
                <label for="sdate-${workingCounter}" class="form-label">Starting Date</label>
                <input type="date" class="form-control" id="sdate-${workingCounter}" name="sdate[]">
            </div>
        `);
    });
});