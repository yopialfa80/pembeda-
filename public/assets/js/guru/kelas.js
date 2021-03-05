console.log('iam ready')

function getKelas() {
    $.ajax({
        data: '',
        url: ServeUrl + "/user/get_kelas",
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
                    html += '<img class="card-img img-fluid" style="width: 100%; height: 150px; max-width: none;" src="'+ BaseUrl + '/assets/images/guru/' + response.responseJSON._data[i].gambar_kelas+'" alt="Card image">';
                    html += '</div>';
                    html += '<div class="col-md-8">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+response.responseJSON._data[i].nama_kelas+'</h5>';
                    html += '<p class="card-text">'+response.responseJSON._data[i].deskripsi_kelas+'</p>';
                    html += '<a type="button" href="'+ BaseUrl + '/guru/detail_kelas/' + response.responseJSON._data[i].id + '" style="width: 50%" class="btn btn-danger w-xs waves-effect waves-light">Detail <i class="ri-arrow-right-line align-middle ml-2 "></i></a>';
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
getKelas();