
function redirectToCurrentPage() {
    window.location.reload(false);
}

$(document).on('click', '.delete-list-data', function (e) {
    e.preventDefault();
    var thisHtml = $(this);
    var id = $(this).attr('data-id');
    var url = $(this).attr('href');
    var flashMessageDom = $('.flash-message');
    flashMessageDom.html('');
    var confirmMessage = confirm("Are you sure?");
    if (confirmMessage) {
        $('#loader').show();
        ajaxDelete(url, {_token: $('meta[name="csrf-token"]').attr('content'), id: id})
        .done(function (response) {
            $('#loader').hide();
            if (response.status === 'success') {
                $("html, body").animate({scrollTop: 0}, "slow");
                flashMessageDom.html(response.message);
                flashMessageDom.fadeIn().delay(2000).fadeOut(2000);
                redirectToCurrentPage();
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
    }
});