var id = window.location.pathname.split('/').pop();
function getPelajaran() {
    $.ajax({
        data: '',
        url: ServeUrl + "/user/get_pelajaran/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                console.log('response.responseJSON._data', response.responseJSON._data)
                var html = '';
                for (let i = 0; i < response.responseJSON._data.length; i++) {
                    
                    html += '<div class="col-lg-6">';
                    html += '<div class="card">';
                    html += '<div class="row no-gutters align-items-center">';
                    html += '<div class="col-md-4">';
                    html += '<img class="card-img img-fluid" style="width: 170px; height: 170px !important;" src="'+ BaseUrl + '/assets/images/guru/' + response.responseJSON._data[i].gambar_pelajaran+'" alt="Card image">';
                    html += '</div>';
                    html += '<div class="col-md-8">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+response.responseJSON._data[i].nama_pelajaran+'</h5>';
                    html += '<p class="card-text" style="height: 43.2px; overflow: hidden;">'+response.responseJSON._data[i].deskripsi_pelajaran+'</p>';
                    html += '<a type="button" href="'+ BaseUrl + '/user/materi/' + response.responseJSON._data[i].id + '" style="width: 50%" class="btn btn-danger w-xs waves-effect waves-light">Masuk <i class="ri-arrow-right-line align-middle ml-2 "></i></a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    
                }

                $('#generateKelas').html(html);

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {

            }
        },
        dataType: 'json'
    })
}
getPelajaran();


function checkAbsen() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var currentDate = new Date();
    var day = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu']
    var data = new FormData();
    data.append("id_kelas", id);
    data.append("tanggal", currentDate.toLocaleDateString());
    var reDate = currentDate.getDay() - 1;
    data.append("hari", day[reDate]);
    data.append("_token", csrf_token );

    $.ajax({
        data: data,
        url: ServeUrl + "/user/check_absen/",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                // $('#staticBackdrop').modal('show');

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {

            }
        },
        dataType: 'json'
    })
    
}
checkAbsen()

console.log('sites', sites)

function checkFirstLogin() {
    if (sites.user.status_login == 'first_login') {
        $('#openModalPass').trigger('click')
    } else {
        console.log('else', sites.user.status_login);
    }
}
checkFirstLogin()

function perbaruiPassword() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var request = new FormData();
    request.append("id_user", sites.user.id );
    request.append("password", $('#new_password').val() );
    request.append("_token", csrf_token );
    
    $.ajax({
        data: request,
        url: ServeUrl + '/user/perbarui_pass',
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
                    title: 'Woah!',
                    icon: 'success',
                    html: '<p class="card-text"><small class="text-muted"><b>Hmm...</b> sepertinya kamu melakukan sesuatu.<br> Perintah yang baru saja kamu lakukan <b>berhasil</b> di proses.</small></p>',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    background: '#fff',
                    confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    onClose: function() {
                        $('#staticBackdrop').modal('hide');
                    }
                })
                

            } else {
                console.log("Something Wrong");
            }
        },error: function(xhr, status, error) {
            console.log("xhr", xhr);
            console.log("status", status);
            console.log("error", error);
        },
    })
}