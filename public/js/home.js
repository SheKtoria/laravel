function changeObjectStatus(id)
{
    let status =$('.status' + id).val();
    if (status === 'save') {
        changeStatus(id ,'not save');
    } else {
        changeStatus(id, 'save');
    }

    function changeStatus(id ,status){
        $.ajax({
            url: '/change',
            type: 'get',
            dataType: 'json',
            data: {
                'id': id,
                'status': status,
            },
        }).done(function (status){
            document.getElementById('status'+ id).value = status.message;
        })
    }
}

function orderObjects() {
    let type = document.getElementById('selectOrder');
    let typeSelect = type.options[type.selectedIndex].value;
    document.location.href = '/sorting/' + typeSelect;
}
function startChat (userId, currentUserId)
{
    $.ajax({
        url: '/start-chat',
        type: 'get',
        dataType: 'json',
        data: {
            'userId': userId,
            'currentUserId': currentUserId,
        },
    }).done( function (users) {
        console.log(users['user1']);
        console.log(users['user2']);
    })
}
