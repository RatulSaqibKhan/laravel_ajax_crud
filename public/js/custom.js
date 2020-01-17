function ajaxGet(url, data) {
    var ajax = $.ajax({
        type : "GET",
        url  : url,
        data  : data
    });

    return ajax;
}

function ajaxPost(url, data) {
    var ajax = $.ajax({
        type : "POST",
        url  : url,
        data  : data
    });

    return ajax;
}

function ajaxPut(url, data) {
    var ajax = $.ajax({
        type : "PUT",
        url  : url,
        data  : data
    })
}

function ajaxDelete(url, data) {
    var ajax = $.ajax({
        type : "DELETE",
        url  : url,
        data  : data
    });

    return ajax;
}

function ajaxDynamic(type, url, data) {
    var ajax = $.ajax({
        type : type,
        url  : url,
        data  : data
    });

    return ajax;
}

$(document).ready(function () {
    var loader = $('#loader');
    // Flash message fade in
    $(document).find('.flash-message').fadeIn().delay(1500).fadeOut(2000);

    $(document).on('hidden.bs.modal', '#delete-confirmation-modal', function (e) {
        e.preventDefault();
        var deleteFormDom = $('#delete-item-form');
        deleteFormDom.attr('action', '');
        deleteFormDom.find('input[name="id"]').val('');
    });
});

