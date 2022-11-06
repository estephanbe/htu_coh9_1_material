// $(document).ready(function () {

// });

$(function () {
    const items = $('#items');
    const quanitiy = $('#quantity');
    const price = $('#price');
    const addItem = $('#add-item');
    const table = $('tbody');
    const totalSalesElement = $('#total-sales');

    let totalSales = 0;

    let counter = 1;
    addItem.click(function (e) {
        e.preventDefault();

        let item = items.val();
        let q = quanitiy.val();
        let p = price.val();

        if (q == "" || p == "" || item == "") {
            alert("You need to enter the item values to proceed!");
            return;
        }

        table.append(`
    <tr>
        <td>${counter}</td>
        <td>${item}</td>
        <td>${q}</td>
        <td>${p}</td>
        <td>${q * p}</td>
    </tr>
    `);

        totalSales += q * p;
        totalSalesElement.text(totalSales);
        counter++;
        $('#userInputContainer').trigger('reset');

    });
});