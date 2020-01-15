function redirectToStudentList() {
    window.location.href = '/students';
}

$(document).on('submit', '#student-form', function (e) {
    e.preventDefault();
    var flashMessageDom = $('.flash-message');
    flashMessageDom.html('');
    var form = $(this);

    $('.text-danger').html('');
    $('#loader').show();
    ajaxDynamic(form.attr('method'), form.attr('action'), form.serialize())
        .done(function (response) {
            $('#loader').hide();
            if (response.status === 'success') {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                flashMessageDom.html(response.message);
                flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
                redirectToStudentList();
            }

            if (response.status === 'danger') {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                flashMessageDom.html(response.message);
                flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
            }
        })
        .fail(function (response) {
            $('#loader').hide();
            $.each(response.responseJSON.errors, function (errorIndex, errorValue) {
                var errorDomElement, error_index, errorMessage;
                errorDomElement = '' + errorIndex;
                errorDomIndexArray = errorDomElement.split(".");
                errorDomElement = '.' + errorDomIndexArray[0];
                error_index = errorDomIndexArray[1];
                errorMessage = errorValue[0];
                if (errorDomIndexArray.length == 1) {
                    $(errorDomElement).html(errorMessage);
                }
            });
        });
});