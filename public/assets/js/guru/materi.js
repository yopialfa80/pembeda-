
var id = window.location.pathname.split('/').pop();
$('#btnTambahMateri').html('<a href="'+BaseUrl + '/guru/tambah_materi/' + id + '" style="width: 20%;" class="btn btn-info w-xs waves-effect waves-light">Tambah Materi<i class="ri-checkbox-circle-line align-middle ml-2 "></i></a>')
function getMateri() {
    $.ajax({
        data: '',
        url: ServeUrl + "/guru/get_materi/" + id,
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
                    html += '<img class="card-img img-fluid" style="width: 200px; height: 180px; max-width: none;" src="' + BaseUrl + '/assets/images/guru/' +response.responseJSON._data[i].gambar_materi+'" alt="Card image">';
                    html += '</div>';
                    html += '<div class="col-md-8">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+response.responseJSON._data[i].nama_materi+'</h5>';
                    html += '<p class="card-text">Materi dibuka pada : '+response.responseJSON._data[i].tanggal_dibuka+'</p>';
                    html += '<p class="card-text">'+response.responseJSON._data[i].deskripsi_materi+'</p>';
                    html += '<a type="button" onclick="detailMateri('+response.responseJSON._data[i].id+')" style="width: 100%; color: white;" class="btn btn-danger w-xs waves-effect waves-light">Detail <i class="ri-arrow-right-line align-middle ml-2 "></i></a>';
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
getMateri();

function detailMateri(id_materi) {
    window.location.href = BaseUrl + '/guru/detail_materi/' + id_materi
}