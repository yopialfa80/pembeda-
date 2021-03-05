var id = window.location.pathname.split('/').pop();
var lengthSoal = 0;
function getDetailMateri() {

    $.ajax({
        data: '',
        url: ServeUrl + "/guru/get_detailmateri/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {
            getSiswa(response.responseJSON._data.materi.unique_id)
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
                var inc = 1;
                lengthSoal = response.responseJSON._data.soal.length
                for (let i = 0; i < lengthSoal; i++) {

                    if (response.responseJSON._data.soal[i].tipe_soal == 'ganda') {

                    html += '<div class="row mt-3 ml-3 mr-3 mb-1" >';
                    html += '<div class="col-md-12">';
                    html += '<span>'+ inc + '. ' + response.responseJSON._data.soal[i].soal+'</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row m-3">';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_a'+inc+'" value="'+response.responseJSON._data.soal[i].jwb_a+'">';
                    html += '<label class="form-check-label" for="jwb_a'+inc+'">';
                    html += response.responseJSON._data.soal[i].jwb_a
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_b'+inc+'" value="'+response.responseJSON._data.soal[i].jwb_b+'">';
                    html += '<label class="form-check-label" for="jwb_b'+inc+'">';
                    html += response.responseJSON._data.soal[i].jwb_b
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_c'+inc+'" value="'+response.responseJSON._data.soal[i].jwb_c+'">';
                    html += '<label class="form-check-label" for="jwb_c'+inc+'">';
                    html += response.responseJSON._data.soal[i].jwb_c
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_d'+inc+'" value="'+response.responseJSON._data.soal[i].jwb_d+'">';
                    html += '<label class="form-check-label" for="jwb_d'+inc+'">';
                    html += response.responseJSON._data.soal[i].jwb_d
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row ml-3 mr-3 mb-4">';
                    html += '<div id="jawabanSoal'+inc+'" style="display: none; width: 100%;" class="alert hasil_soal_materi" role="alert"></div>';
                    html += '</div>';

                    inc++;

                    } else {

                    html += '<div class="row mt-3 ml-3 mr-3 mb-1" >';
                    html += '<div class="col-md-12">';
                    html += '<span>'+ inc + '. ' + response.responseJSON._data.soal[i].soal+'</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row m-3">';
                    html += '<div class="col-md-12">';

                    html += '<textarea id="jawabanEssay'+inc+'" class="form-control input_textarea_disabled" maxlength="225" rows="3" placeholder="Jawaban Anda"></textarea>';


                    html += '</div>';

                    html += '</div>';

                    inc++;
                    }
                }

                $('#generateFileMateri').html(generateFile);
                $('#generateMateriText').html(response.responseJSON._data.materi.text_materi);
                $('#namaMateri').html(response.responseJSON._data.materi.nama_materi)
                $('#generateSoal').html(html);
            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {
                
            }
        },
        dataType: 'json'
    })
}
getDetailMateri();

function redirectSoal() {
    window.location.href = BaseUrl + '/user/soal_materi/' + id;
}

var globalTest = '';
function getSiswa(uniqid_id) {
    globalTest = uniqid_id
    $.ajax({
        url: ServeUrl + '/guru/get_siswamateri/' + uniqid_id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        dataType: 'json',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                
                var data = response.responseJSON._data
                var html = ''
                for (let i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td scope="row">1</td>';
                    html += '<td>'+data[i].name+'</td>';
                    html += '<td>'+data[i].nis_nisn+'</td>';
                    html += '<td><button onclick="detailJawaban('+ data[i].id+')" type="button" class="btn btn-success waves-effect waves-light btn-sm">Lihat Jawaban</button></td>';
                    html += '</tr>';
                }

                $('#generateSiswa').html(html)

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

function detailJawaban(user_id, uniqid_id) {
    window.location.href = BaseUrl + '/guru/jawaban/' + user_id + '/' + globalTest
}