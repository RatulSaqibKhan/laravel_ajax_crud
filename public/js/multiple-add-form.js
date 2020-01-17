//Add More Row
$(document).on('click', '.add-more-tr', function () {
    var table_row = $('.table-row');
    var thisHtml = $(this);

    var confirmAddRow = confirm('Do you want to add new row?');
    if (confirmAddRow) {
        var cloneTr = thisHtml.parents('tr').clone();
        $('tbody').append(cloneTr);
        $(".add-more-tr").removeClass('hideDom');
        $(".remove-tr").removeClass('hideDom');
    }
});

// Remove Row
$(document).on('click', '.remove-tr', function () {
    var confirmDeleteRow;
    var table_row = $('.table-row');
    var thisHtml = $(this);
    confirmDeleteRow = confirm('Are you sure you want to delete this data?');

    if (confirmDeleteRow) {
        $('#loader').show();
        setTimeout(function () {
            $('#loader').hide();
            thisHtml.parents('.table-row').remove();
            $("tbody tr:eq(" + (table_row.length - 2) + ")").find('.add-table-row').removeClass('hide');
            if (table_row.length <= 2) {
                $(".add-more-tr").removeClass('hideDom');
                $(".remove-tr").addClass('hideDom');
            }
        }, 500);
    }
});
