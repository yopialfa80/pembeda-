var id = window.location.pathname.split('/').pop();
function getDetailMateri() {

    $.ajax({
        data: '',
        url: ServeUrl + "/user/get_detailmateri/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {

                if (response.responseJSON._data.soal === 'sudah') {
                    $('#btnSoals').hide()
                }

                var html = '';

                var generateFile = '';
                for (let i = 0; i < response.responseJSON._data.materi_file.length; i++) {
                    var extension = response.responseJSON._data.materi_file[i].file.split('.').pop();
                    switch (extension) {
                        case 'pdf':
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-file-pdf-box mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;

                        case 'doc':
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-file-word-box mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;

                        case 'ppt':
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-file-powerpoint-box mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;

                        case 'png':
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-folder-image mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;

                        case 'jpg':
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-folder-image mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;
                    
                        default:
                            generateFile += '<a class="costum_file_container" target="_blank" href="'+BaseUrl + '/assets/images/guru/' + response.responseJSON._data.materi_file[i].file + '"><i style="font-size: 20px;" class="mdi mdi-file mr-3"></i>'+response.responseJSON._data.materi_file[i].file+'</a>'
                            break;
                    }
                }

                $('#generateFileMateri').html(generateFile);

                if (response.responseJSON._message == 'belum absen') {
                    checkAbsen(response.responseJSON._data.materi.absen_mulai, response.responseJSON._data.materi.absen_berakhir);
                } else {
                    html += '<div class="col-lg-12">';
                    html += '<div class="card bg-success text-white-50">';
                    html += '<div class="card-body">';
                    html += '<div class="row">';
                    html += '<div class="col-md-6">';
                    html += '<h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-information-outline mr-2"></i> Kamu sudah Absen</h5>';
                    html += '</div>';
                    html += '<div class="col-md-3">';
                    html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Dibuka pada : 01-02-2021:21:00</h5>';
                    html += '</div>';
                    html += '<div class="col-md-3">';
                    html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Ditutup pada : 01-02-2021</h5>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
    
                    $('#generateAbsensi').html(html);
                }

                $('#generateMateriText').html(response.responseJSON._data.materi.text_materi);
                $('#namaMateri').html(response.responseJSON._data.materi.nama_materi)

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {
                
            }
        },
        dataType: 'json'
    })
}
getDetailMateri();

function checkAbsen(mulai, akhir) {

    var current = new Date();
    var currentTime = current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds();

    var hoursStart = mulai.substring(0, 2);
    var hoursEnd = akhir.substring(0, 2);
    var hoursCurrent = currentTime.substring(0, 2);

    var html = '';
    if (hoursCurrent >= hoursStart && hoursCurrent <= hoursEnd) {
        
        html += '<div class="col-lg-12">';
        html += '<div class="card bg-primary text-white-50">';
        html += '<div class="card-body">';
        html += '<div class="row">';
        html += '<div class="col-md-6">';
        html += '<h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-information-outline mr-2"></i> Kamu belum Absen</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Dibuka pada : '+mulai+'</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Ditutup pada : '+akhir+'</h5>';
        html += '</div>';
        html += '<p class="card-text">Kamu belum absen pada kelas ini. Tekan tombol di bawah untuk melakukan absen untuk hari ini</p>';
        html += '<button type="button" onclick="absenSekarang()" style="width: 100%;" class="btn btn-info w-xs waves-effect waves-light">Absen Sekarang<i class="ri-checkbox-circle-line align-middle ml-2 "></i></button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#generateAbsensi').html(html);
        console.log('buka')
    } else if (hoursCurrent <= hoursStart) {
        
        html += '<div class="col-lg-12">';
        html += '<div class="card bg-warning text-white-50">';
        html += '<div class="card-body">';
        html += '<div class="row">';
        html += '<div class="col-md-6">';
        html += '<h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-information-outline mr-2"></i> Absen belum Dibuka</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Dibuka pada : '+mulai+'</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Ditutup pada : '+akhir+'</h5>';
        html += '</div>';
        // html += '<p class="card-text">Pastikan waktu saat ini sesuai atau lebih dari jam buka absen yang ditentukan</p>';
        // html += '<button type="button" style="width: 100%;" class="btn btn-info w-xs waves-effect waves-light">Absen Sekarang<i class="ri-checkbox-circle-line align-middle ml-2 "></i></button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('#generateAbsensi').html(html);

    } else {

        html += '<div class="col-lg-12">';
        html += '<div class="card bg-danger text-white-50">';
        html += '<div class="card-body">';
        html += '<div class="row">';
        html += '<div class="col-md-6">';
        html += '<h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-information-outline mr-2"></i> Absen sudah Ditutup</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Dibuka pada : '+mulai+'</h5>';
        html += '</div>';
        html += '<div class="col-md-3">';
        html += '<h5 class="mt-0 mb-4 text-white text-right" style="font-size: 12px;"><i class="mdi mdi-calendar mr-1"></i> Ditutup pada : '+akhir+'</h5>';
        html += '</div>';
        html += '<p class="card-text">Kamu sudah terlambat untuk melakukan absen pada materi ini.</p>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        $('#generateAbsensi').html(html);

    }
}


function absenSekarang() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var current = new Date();
    var data = new FormData();
    data.append("id_materi", id);
    data.append("waktu", current.getHours() + ':' + current.getMinutes() + ':' + current.getSeconds());
    data.append("_token", csrf_token );

    $.ajax({
        data: data,
        url: ServeUrl + "/user/absen_sekarang/",
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
                        getDetailMateri();
                    }
                  })

            } else {
                console.log('error')
            }
        },
        dataType: 'json'
    })
}

function redirectSoal() {
    window.location.href = BaseUrl + '/user/soal_materi/' + id;
}