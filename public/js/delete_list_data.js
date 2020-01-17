function redirectToCurrentPage() {
    window.location.reload(false);
}

function openConfirmationModal(id, url) {
    var deleteFormDom = $('#delete-item-form');
    deleteFormDom.attr('action', url);
    deleteFormDom.find('input[name="id"]').val(id);
    $('#delete-confirmation-modal').modal({
        keyboard: false,
        backdrop: false,
        show: true,
    });
}

function closeConfirmationModal() {
    $('#delete-confirmation-modal').modal('hide');
}

$(document).on('click', '.delete-list-data', function (e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var url = $(this).attr('href');
    openConfirmationModal(id, url);
});



$(document).on('submit', '#delete-item-form', function (e) {
    e.preventDefault();
    var form = $(this);
    var flashMessageDom = $('.flash-message');
    flashMessageDom.html('');
    $('#loader').show();
    closeConfirmationModal();
    ajaxDynamic(form.attr('method'), form.attr('action'), form.serialize())
        .done(function (response) {
            $('#loader').hide();
            if (response.status === 'success') {
                $("html, body").animate({scrollTop: 0}, "slow");
                flashMessageDom.html(response.message);
                flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
                setTimeout(redirectToCurrentPage(), 2000);
            }

            if (response.status === 'danger') {
                $("html, body").animate({scrollTop: 0}, "slow");
                flashMessageDom.html(response.message);
                flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
            }
        })
        .fail(function (response) {
            $('#loader').hide();
            console.log(response.responseJSON);
        });
});
