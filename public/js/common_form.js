$(document).on('change keyup', 'select,input,textarea', function (e) {
    e.preventDefault();
    var nameAttrExist = $(this).attr('name');

    if (typeof nameAttrExist !== typeof undefined && nameAttrExist !== false) {
        var nameAttr = nameAttrExist.replace(/[^\w\s]/gi, '');
        $(this).parent()[0].querySelector('span.' + nameAttr).innerHTML = '';
    }
});
