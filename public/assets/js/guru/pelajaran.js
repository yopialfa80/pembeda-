var id = window.location.pathname.split('/').pop();
function getPelajaran() {
    $.ajax({
        data: '',
        url: ServeUrl + "/guru/get_pelajaran/",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                console.log('response.responseJSON._data', response.responseJSON._data.pelajaran)
                var html = '';
                for (let i = 0; i < response.responseJSON._data.pelajaran.length; i++) {
                    
                    html += '<div class="col-lg-6">';
                    html += '<div class="card">';
                    html += '<div class="row no-gutters align-items-center">';
                    html += '<div class="col-md-4">';
                    html += '<img class="card-img img-fluid" style="width: 170px; height: 170px !important;" src="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.pelajaran[i].gambar_pelajaran+'" alt="Card image">';
                    html += '</div>';
                    html += '<div class="col-md-8">';
                    html += '<div class="card-body">';
                    html += '<h5 class="card-title">'+response.responseJSON._data.pelajaran[i].nama_pelajaran+'<div style="display: inline; float: right;" class="text-right"><span class="text-right">'+response.responseJSON._data.kelas[i].nama_kelas+'</span></div></h5>';
                    html += '<p class="card-text" style="height: 43.2px; overflow: hidden;">'+response.responseJSON._data.pelajaran[i].deskripsi_pelajaran+'</p>';
                    html += '<a type="button" href="'+ BaseUrl + '/guru/materi/' + response.responseJSON._data.pelajaran[i].id + '" style="width: 50%" class="btn btn-danger w-xs waves-effect waves-light">Materi <i class="ri-arrow-right-line align-middle ml-2"></i></a>';
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