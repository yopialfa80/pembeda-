var currentLocation = window.location;
const urlParts = currentLocation.pathname.split('/').filter(Boolean);

function getJawaban() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var request = new FormData();
    request.append("id_user", urlParts[2] );
    request.append("uniqid_id", urlParts[3] );
    request.append("_token", csrf_token );
    
    $.ajax({
        data: request,
        url: ServeUrl + '/guru/get_detail_jawaban',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        dataType: 'json',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                var html = ''
                var inc = 1;
                for (let i = 0; i < response.responseJSON._data.soal.length; i++) {

                    if (response.responseJSON._data.soal[i].tipe_soal == 'ganda') {
                        
                    html += '<div class="row mt-3 ml-3 mr-3 mb-1" >';
                    html += '<div class="col-md-12">';
                    html += '<span>'+ inc + '. ' + response.responseJSON._data.soal[i].soal+'</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row m-3">';

                    html += '<div class="col-md-12">';
                    html += '<div class="alert alert-primary mb-3"> Jawaban Benar: <b>';
                    html += response.responseJSON._data.soal[i].jawaban_benar
                    html += '</b></div>';
                    html += '</div>';

                    if (response.responseJSON._data.soal[i].jawaban_benar != response.responseJSON._data.soal[i].jawaban_user) {
                        html += '<div class="col-md-12">';
                        html += '<div class="alert alert-danger mb-3">Jawaban User: <b>';
                        html += response.responseJSON._data.soal[i].jawaban_user
                        html += '</b></div>';
                        html += '</div>';
                    } else {
                        html += '<div class="col-md-12">';
                        html += '<div class="alert alert-primary mb-3">Jawaban User: <b>';
                        html += response.responseJSON._data.soal[i].jawaban_user
                        html += '</b></div>';
                        html += '</div>';
                    }
                    

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

                $('#generateSoal').html(html)

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

getJawaban()