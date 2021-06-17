$(document).ready(function () {
    $('.change-status').on('click', function () {
        let status = $('.status').val();
        let id = $('.status').val();
        debugger;
        document.location.href = '/change/' + status;
    })
})
