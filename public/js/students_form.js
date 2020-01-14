$(document).on('submit', '#student-form', function (e) {
    e.preventDefault();
    var flashMessageDom = $('.flash-message');
    flashMessageDom.html('');
    var form = $(this);
    var url = form.attr('action');

    $('.text-danger').html('');
    $('#loader').show();
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize()
    }).done(function (response) {
        $('#loader').hide();
        if (response.status === 'success') {
            flashMessageDom.html(response.message);
            flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
            redirectToSparePartRequisitionList();
        }

        if (response.status === 'danger') {
            flashMessageDom.html(response.message);
            flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
        }
    }).fail(function (response) {
        $('#loader').hide();
        $.each(response.responseJSON.errors, function (errorIndex, errorValue) {
            let errorDomElement, error_index, errorMessage;
            errorDomElement = '' + errorIndex;
            errorDomIndexArray = errorDomElement.split(".");
            errorDomElement = '.' + errorDomIndexArray[0];
            error_index = errorDomIndexArray[1];
            errorMessage = errorValue[0];
            if (errorDomIndexArray.length == 1) {
                $(errorDomElement).html(errorMessage);
            } else {
                $("tbody tr:eq(" + error_index + ")").find(errorDomElement).html(errorMessage);
            }
        });
    });
});