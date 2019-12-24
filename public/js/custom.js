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