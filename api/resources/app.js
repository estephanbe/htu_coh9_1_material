$(function () {
    const baseURL = "http://coh91-api.local";
    const itemInput = $('#item-input');
    const add = $('#add');
    const itemsContainer = $('#items-container');

    // on loading the app
    $.ajax({
        url: baseURL + "/items",
        type: "GET",
        success: function (data) {
            data.body.forEach(element => {
                console.log(element.completed);
                itemsContainer.append(`
                <div data-id="${element.id}" class="item w-25 justify-content-between align-items-center mb-3 p-1 border-bottom ${element.completed == 1 ? "completed" : "" }">
                    <input class="form-check-input" type="checkbox" ${element.completed == 1 ? "checked" : "" }>
                    <p class="m-0">${element.name}</p>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                `);

                $(`div[data-id="${element.id}"] input`).change(function (e) {
                    $(this).parent().toggleClass('completed');
                    $.ajax({
                        type: "PUT",
                        url: baseURL + "/items/update",
                        data: JSON.stringify({
                            id: element.id
                        }),
                        dataType: "application/json",
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                });

                $(`div[data-id="${element.id}"] button`).click(function (e) {
                    $.ajax({
                        type: "DELETE",
                        url: baseURL + "/items/delete",
                        data: JSON.stringify({
                            id: element.id
                        }),
                        dataType: "application/json",
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                    $(this).parent().hide('slow', function () {
                        $(this).remove();
                    });

                });
            });

        }
    });

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

        $.ajax({
            type: "POST",
            url: baseURL + "/items/create",
            data: JSON.stringify({
                name: itemContent
            }),
            dataType: "application/json",
            success: function (response) {
                console.log('done')
                itemsContainer.append(`
                <div data-id="${response.id}" class="item w-25 justify-content-between align-items-center mb-3 p-1 border-bottom">
                    <input class="form-check-input" type="checkbox">
                    <p class="m-0">${response.name}</p>
                    <button class="btn btn-danger">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
                `);

                $(`div[data-id="${response.id}"] input`).change(function (e) {
                    $(this).parent().toggleClass('completed');
                    $.ajax({
                        type: "PUT",
                        url: baseURL + "/items/update",
                        data: JSON.stringify({
                            id: response.id
                        }),
                        dataType: "application/json",
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                });

                $(`div[data-id="${response.id}"] button`).click(function (e) {
                    $(this).parent().hide('slow', function () {
                        $(this).remove();
                    });
                    $.ajax({
                        type: "DELETE",
                        url: baseURL + "/items/delete",
                        data: JSON.stringify({
                            id: element.id
                        }),
                        dataType: "application/json",
                        success: function (response) {
                            console.log(response)
                        },
                        error: function (e) {
                            console.log(e)
                        }
                    });
                });

                itemInput.val('');
                itemInput.focus();
            },
            error: function (e) {
                console.log(e);
            }
        });




    });



});