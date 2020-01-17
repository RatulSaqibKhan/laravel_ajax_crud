$(document).on('click', '.create-button', function (e) {
   e.preventDefault();
   var href = $(this).attr('data-href');

   window.location.href = href;
});