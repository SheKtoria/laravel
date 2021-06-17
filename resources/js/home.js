$('.changeStatus').on('click', function () {
    debugger;
    let status = $('.status').val();
    $.ajax('change', {
        type: 'POST',
        data: {
            'status': status,
        },
        dataType: 'json',
    })
})
