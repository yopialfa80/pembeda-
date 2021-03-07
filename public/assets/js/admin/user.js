var csrf_token = $('meta[name="csrf-token"]').attr('content');
$("#createNewUser").submit(function(event) {
    event.preventDefault();
    
    var form = $('#createNewUser')[0];
    var data = new FormData(form);
    data.append("_token", csrf_token );
    $.ajax({
        data: data,
        url: ServeUrl + "/admin/tambah_user",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            if (response.responseJSON._status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil !',
                    text: response.responseJSON._message,
                    confirmButtonColor: "#0D6EFD",
                    confirmButtonText: 'Baiklah',
                    onClose: function() {
                        location.reload();
                    }
                  })
            } else {
                Swal.fire({
                    type: "error",
                    title: 'Woah!',
                    icon: 'error',
                    html: '<p class="card-text"><small class="text-muted">'+response.responseJSON._message+'</small></p>',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    background: '#fff',
                    confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    onClose: function() {
                        
                    }
                })
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

function getUser() {

    $('#datatable-buttons').DataTable().clear();
    $('#datatable-buttons').DataTable().destroy();
    
    $.ajax({
        data: '',
        url: ServeUrl + "/admin/get_user",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                var html = '';
                var inc = 1;
                for (let i = 0; i < response.responseJSON._data.length; i++) {
                    
                    html += '<tr>';
                    html += '<td scope="row">'+inc+'</td>';

                    if (response.responseJSON._data[i].picture == null) {
                        html += '<td><img style="width: 40px; height: 40px;" src="'+ BaseUrl + '/assets/images/data/default.png"</td>';
                    } else {
                        html += '<td><img style="width: 40px; height: 40px;" src="'+ BaseUrl + '/assets/images/data/' + response.responseJSON._data[i].picture+'"</td>';
                    }

                    
                    html += '<td>'+response.responseJSON._data[i].name+'</td>';
                    html += '<td>'+response.responseJSON._data[i].username+'</td>';
                    html += '<td>'+response.responseJSON._data[i].nis_nisn+'</td>';
                    html += '<td>'+response.responseJSON._data[i].tanggal_lahir+'</td>';
                    html += '<td>'+response.responseJSON._data[i].tempat_lahir+'</td>';
                    html += '<td>'+response.responseJSON._data[i].jenis_kelamin+'</td>';
                    html += '<td>'+response.responseJSON._data[i].agama+'</td>';
                    html += '<td><a type="button" onclick="resetPassword('+response.responseJSON._data[i].id+')" style="color: white;" class="btn btn-danger btn-sm w-xs waves-effect waves-light">Password</a></td>';
                    html += '</tr>';
                    inc++
                }
                $('#generateUser').html(html);
                reinitDatatable()
                
            } else {

            }
        },
        dataType: 'json'
    })
}

getUser()

var curIdUser = 0;
function resetPassword(id_user) {
    curIdUser = id_user;
    $('#showPass').modal('show')
}

function submitPasswordChange() {
    var request = new FormData();
    request.append("id_user", curIdUser );
    request.append("new_password", $('#new_password').val() );
    request.append("_token", csrf_token );
    
    $.ajax({
        data: request,
        url: ServeUrl + '/admin/reset_password',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        dataType: 'json',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                
                Swal.fire({
                    type: "success",
                    icon: "success",
                    title: 'Woah!',
                    html: '<p class="card-text"><small class="text-muted"><b>Hmm...</b> sepertinya kamu melakukan sesuatu.<br> Perintah yang baru saja kamu lakukan <b>berhasil</b> di proses.</small></p>',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    background: '#fff',
                    confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    onClose: function() {
                        $('#showPass').modal('hide')
                    }
                })

            } else {
                Swal.fire({
                    type: "error",
                    title: 'Woah!',
                    icon: 'error',
                    html: '<p class="card-text"><small class="text-muted">'+response.responseJSON.message+'</small></p>',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    background: '#fff',
                    confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    onClose: function() {
                        
                    }
                })
            }
        },error: function(xhr, status, error) {
            console.log("xhr", xhr);
            console.log("status", status);
            console.log("error", error);
        },
    })
}

function reinitDatatable() {
    $("#datatable-buttons").dataTable({
        retrieve: true,
        "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        "columnDefs": [{ "targets": 3, "orderable": false }],
        "pagingType": "full_numbers",
        "oLanguage": { "sSearch": "" },
        "deferRender": true
    });
}