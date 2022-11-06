$(function () {
    const itemInput = $('#item-input');
    const add = $('#add');
    const itemsContainer = $('#items-container');

    // to automatically focus on the input without the user action to click on the input to start typing
    itemInput.focus();

    let counter = 1;

    add.click(function () {
        const itemContent = itemInput.val();

        if (itemContent == "") {
            alert("You need to add item");
            return;
        }

        // check if the item is already existed in the app. 
        // Get all items
        let items = $('.item p');
        let additionSwitch = false;
        // loop through all items
        items.each(function (i) {
            // check if the current item in the loop equals the new item.
            if ($(this).text() == itemContent) {
                alert('This item is already exists.');
                additionSwitch = true;
            }
        });
        if (additionSwitch) {
            return;
        }

        itemsContainer.append(`
        <div data-id="${counter}" class="item w-25 justify-content-between align-items-center mb-3 p-1 border-bottom">
            <input class="form-check-input" type="checkbox">
            <p class="m-0">${itemContent}</p>
            <button class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
        `);

        $(`div[data-id="${counter}"] input`).change(function (e) {
            // if ($(this).parent().hasClass('completed')) {
            //     $(this).parent().removeClass('completed');
            // } else {
            //     $(this).parent().addClass('completed');
            // }
            $(this).parent().toggleClass('completed');
        });

        $(`div[data-id="${counter}"] button`).click(function (e) {
            $(this).parent().hide('slow', function () {
                $(this).remove();
            });
        });

        itemInput.val('');
        itemInput.focus();
        counter++;
    });



});