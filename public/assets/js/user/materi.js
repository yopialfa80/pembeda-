var id = window.location.pathname.split('/').pop();

var idMateri = [];
var materiDibuka = [];
function getPelajaran() {
    $.ajax({
        data: '',
        url: ServeUrl + "/user/get_materi/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {
                var html = '';
                for (let i = 0; i < response.responseJSON._data.length; i++) {
                    idMateri[i] = response.responseJSON._data[i].id
                    materiDibuka[i] = response.responseJSON._data[i].tanggal_dibuka
                    
                    html += '<div class="col-lg-6">';
                    html += '<div class="card">';
                    html += '<div class="row no-gutters align-items-center">';
                    html += '<div class="col-md-4">';
                    html += '<img class="card-img img-fluid" style="width: 200px; height: 180px; max-width: none;" src="' + BaseUrl + '/assets/images/guru/' +response.responseJSON._data[i].gambar_materi+'" alt="Card image">';
                    html += '</div>';
                    html += '<div class="col-md-8">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+response.responseJSON._data[i].nama_materi+'</h5>';
                    html += '<p class="card-text">Materi dibuka pada : '+response.responseJSON._data[i].tanggal_dibuka+'</p>';
                    html += '<p class="card-text">'+response.responseJSON._data[i].deskripsi_materi+'</p>';
                    html += '<a type="button" onclick="accessMateri('+i+')" style="width: 100%; color: white;" class="btn btn-danger w-xs waves-effect waves-light">Masuk <i class="ri-arrow-right-line align-middle ml-2 "></i></a>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                }

                $('#generateMateri').html(html);

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {

            }
        },
        dataType: 'json'
    })
}
getPelajaran();

function accessMateri(increment) {

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd;
    if (materiDibuka[increment] == today) {
        window.location.href = BaseUrl + '/user/detail_materi/' + idMateri[increment]
    } else {
        $('#staticBackdrop').modal('show')
    }
    
}