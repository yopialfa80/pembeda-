var id = window.location.pathname.split('/').pop();
function getUser() {
    $.ajax({
        data: '',
        url: ServeUrl + "/guru/get_user/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                console.log('response.responseJSON._data', response.responseJSON._data)
                var html = '';
                var inc = 1;
                for (let i = 0; i < response.responseJSON._data.length; i++) {
                    
                    html += '<tr>';
                    html += '<th scope="row">'+inc+'</th>';
                    html += '<td>'+response.responseJSON._data[i].name+'</td>';
                    html += '<td>'+response.responseJSON._data[i].nis_nisn+'</td>';
                    html += '<td>'+response.responseJSON._data[i].tanggal_lahir+'</td>';
                    html += '<td>'+response.responseJSON._data[i].jenis_kelamin+'</td>';
                    // html += '<td><a href="" style="width: 80%;" class="btn btn-danger btn-sm waves-effect waves-light">Detail</a></td>';
                    html += '</tr>';
                    inc++
                }

                $('#generateUser').html(html);

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {

            }
        },
        dataType: 'json'
    })
}
getUser();

function addUser() {
    $('#staticBackdrop').modal('show')
    addUserClass();
}

function addUserClass() {
    $.ajax({
        data: '',
        url: ServeUrl + "/guru/get_user_add_class/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                var html = '';
                var inc = 1;
                for (let i = 0; i < response.responseJSON._data.user.length; i++) {
                    
                    if (response.responseJSON._data.user[i].id_kelas == 'GURU' || response.responseJSON._data.user[i].id_kelas == 'ADMIN') {
                        
                    } else {
                        html += '<tr>';
                        html += '<th scope="row">'+inc+'</th>';
                        html += '<td>'+response.responseJSON._data.user[i].name+'</td>';
                        html += '<td>'+response.responseJSON._data.user[i].nis_nisn+'</td>';

                        if (response.responseJSON._data.kelas[i] != null) {
                            html += '<td>'+response.responseJSON._data.kelas[i].nama_kelas+'</td>';
                        } else {
                            html += '<td>'+response.responseJSON._data.user[i].id_kelas+'</td>';
                        }
                        html += '<td><a onclick="tambahkanUser('+response.responseJSON._data.user[i].id+')" style="width: 80%; color: white;" class="btn btn-primary btn-sm waves-effect waves-light">Tambah</a></td>';
                        html += '</tr>';
                        inc++
                    }
                }

                $('#generateUsers').html(html);

            } else {

            }
        },
        dataType: 'json'
    })
}

function tambahkanUser(id_user) {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var data = new FormData();
    data.append("id", id_user);
    data.append("id_kelas", id);
    data.append("_token", csrf_token );

      $.ajax({
        data: data,
        url: ServeUrl + "/guru/add_user_class",
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
                        addUserClass();
                        getUser()
                    }
                  })
            } else {

            }
        },
        dataType: 'json'
    })
}