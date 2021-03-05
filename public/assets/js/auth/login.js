var ServeUrl = "http://127.0.0.1:8000/api";
var BaseUrl = "http://127.0.0.1:8000";
var csrf_token = $('meta[name="csrf-token"]').attr('content');
$("#authLogin").submit(function(event) {
    event.preventDefault();
    
    var form = $('#authLogin')[0];
    var data = new FormData(form);
    data.append("_token", csrf_token );
    $.ajax({
        data: data,
        url: ServeUrl + "/login",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                console.log('success', response.responseJSON._status)
                // responseMessage(response.responseJSON.message);

                if (response.responseJSON.roles == 'User') {
                    window.location.href = BaseUrl + '/user/pelajaran';
                } else if (response.responseJSON.roles == 'Guru') {
                    window.location.href = BaseUrl + '/guru/kelas';
                } else {
                    window.location.href = BaseUrl + '/admin/user';
                }
                // 

            } else if (response.responseJSON._status == 401) {
                // responseMessage(response.responseJSON.message);

            } else if (response.responseJSON._status == 500) {

                // responseMessage(response.responseJSON.message);
            } else {

                // responseMessage(response.responseJSON.message);

            }
        },
        dataType: 'json'
    })
});

$('#logout').hide();

$("#logo-main-login").hover(function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("login2.png", "login3.png");
    });
}, function(){
    $(this).attr("src", function(index, attr){
        return attr.replace("login3.png", "login2.png");
    });
});