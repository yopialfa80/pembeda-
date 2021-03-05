var id = window.location.pathname.split('/').pop();
var lengthSoal = 0;
var jawaban_benar = [];
var jawaban_a = [];
var jawaban_b = [];
var jawaban_c = [];
var jawaban_d = [];
var dataLocal = [];
function getSoalMateri() {

    $.ajax({
        data: '',
        url: ServeUrl + "/user/get_soalmateri/" + id,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        complete: function(response) {

            if (response.responseJSON._status == 200) {
                console.log('object', response.responseJSON._data)
                lengthSoal = response.responseJSON._data.length
                
                var html = '';
                var inc = 1;

                dataLocal = response.responseJSON._data

                for (let i = 0; i < lengthSoal; i++) {

                    if (response.responseJSON._data[i].tipe_soal == 'ganda') {

                    // jawaban_a[i] = response.responseJSON._data[i].jwb_a;
                    // jawaban_b[i] = response.responseJSON._data[i].jwb_b;
                    // jawaban_c[i] = response.responseJSON._data[i].jwb_c;
                    // jawaban_d[i] = response.responseJSON._data[i].jwb_d;

                    // jawaban_benar[i] = response.responseJSON._data[i].jawaban_benar
                    html += '<div class="row mt-3 ml-3 mr-3 mb-1" >';
                    html += '<div class="col-md-12">';
                    html += '<span>'+ inc + '. ' + response.responseJSON._data[i].soal+'</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row m-3">';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_a'+inc+'" value="'+response.responseJSON._data[i].jwb_a+'">';
                    html += '<label class="form-check-label" for="jwb_a'+inc+'">';
                    html += response.responseJSON._data[i].jwb_a
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_b'+inc+'" value="'+response.responseJSON._data[i].jwb_b+'">';
                    html += '<label class="form-check-label" for="jwb_b'+inc+'">';
                    html += response.responseJSON._data[i].jwb_b
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_c'+inc+'" value="'+response.responseJSON._data[i].jwb_c+'">';
                    html += '<label class="form-check-label" for="jwb_c'+inc+'">';
                    html += response.responseJSON._data[i].jwb_c
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="col-md-6">';
                    html += '<div class="form-check mb-3">';
                    html += '<input class="form-check-input input_radio_disabled" type="radio" name="soal'+inc+'" id="jwb_d'+inc+'" value="'+response.responseJSON._data[i].jwb_d+'">';
                    html += '<label class="form-check-label" for="jwb_d'+inc+'">';
                    html += response.responseJSON._data[i].jwb_d
                    html += '</label>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="row ml-3 mr-3 mb-4">';
                    html += '<div id="jawabanSoal'+inc+'" style="display: none; width: 100%;" class="alert hasil_soal_materi" role="alert"></div>';
                    html += '</div>';

                    inc++;

                    } else {

                        // jawaban_benar[i] = response.responseJSON._data[i].jawaban_benar
                    html += '<div class="row mt-3 ml-3 mr-3 mb-1" >';
                    html += '<div class="col-md-12">';
                    html += '<span>'+ inc + '. ' + response.responseJSON._data[i].soal+'</span>';
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

                if (response.responseJSON._data[0].tipe_soal == 'ganda') {
                    $('#generateButtonSubmit').html('<a id=btnSubmitJawaban type="button" onclick="submitSoalganda()" style="width: 100%; color: white;" class="btn btn-danger w-xs waves-effect waves-light">Submit <i class="ri-arrow-right-line align-middle ml-2 "></i></a>');
                } else {
                    $('#generateButtonSubmit').html('<a id=btnSubmitJawaban type="button" onclick="submitSoalEssay()" style="width: 100%; color: white;" class="btn btn-danger w-xs waves-effect waves-light">Submit <i class="ri-arrow-right-line align-middle ml-2 "></i></a>');
                }

                $('#generateSoal').html(html);
                
            } else {
                
            }
        },
        dataType: 'json'
    })
}
getSoalMateri();



function submitSoalganda() {

    var userAnswer = [];
    var inc = 1;
    for (let i = 0; i < lengthSoal; i++) {
        if (document.getElementById('jwb_a'+inc).checked ) {
            userAnswer[i] = 'jwb_a'
            console.log('ss',$('#jwb_a'+inc).val())
        } else if (document.getElementById('jwb_b'+inc).checked) {
            userAnswer[i] = 'jwb_b'

        } else if (document.getElementById('jwb_c'+inc).checked) {
            userAnswer[i] = 'jwb_c'

        } else if (document.getElementById('jwb_d'+inc).checked) {
            userAnswer[i] = 'jwb_d'

        }

        if (dataLocal[i].jawaban_benar == userAnswer[i]) {
            $('#jawabanSoal'+inc).addClass('alert-info');
            $('#jawabanSoal'+inc).html('Jawaban kamu benar');

        } else {
            $('#jawabanSoal'+inc).addClass('alert-danger');
            $('#jawabanSoal'+inc).html('Jawaban kamu kurang tepat');
        }

        console.log('rate_value', userAnswer)
        inc++;
    }

    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var data = new FormData();
    data.append("id", id);

    for (let i = 0; i < userAnswer.length; i++) {
        data.append("jawaban_user[]", userAnswer[i]);
    }

    data.append("_token", csrf_token );

    $.ajax({
        data: data,
        url: ServeUrl + "/user/submit_jawaban/",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            if (response.responseJSON._status == 200) {
                console.log('response.responseJSON', response.responseJSON)

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil !',
                    text: response.responseJSON._message,
                    confirmButtonColor: "#0D6EFD",
                    confirmButtonText: 'Baiklah',
                    onClose: function() {
                        $('#btnSubmitJawaban').hide()
                        $('.hasil_soal_materi').css('display', 'inline')
                        $( ".input_radio_disabled").attr('disabled', 'disabled');
                        $( ".input_textarea_disabled").css('color', '#ebebeb');
                        
                    }
                  })
            } else {
                
            }
        },
        dataType: 'json'
    })
    
    
}

function submitSoalEssay() {
    
    var jawabanEssayUser = [];
    var inc = 1;
    for (let i = 0; i < lengthSoal; i++) {
        jawabanEssayUser[i] = $('#jawabanEssay'+inc).val()
        inc++;
    }
    
    console.log('jawabanEssayUser', jawabanEssayUser)
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var data = new FormData();
    data.append("id", id);

    for (let i = 0; i < jawabanEssayUser.length; i++) {
        data.append("jawaban_user[]", jawabanEssayUser[i]);
    }

    data.append("_token", csrf_token );

    $.ajax({
        data: data,
        url: ServeUrl + "/user/submit_jawaban/",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            if (response.responseJSON._status == 200) {
                console.log('response.responseJSON', response.responseJSON)

                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil !',
                    text: response.responseJSON._message,
                    confirmButtonColor: "#0D6EFD",
                    confirmButtonText: 'Baiklah',
                    onClose: function() {
                        $( ".input_textarea_disabled").attr('disabled', 'disabled');
                        $( ".input_textarea_disabled").css('background', '#ebebeb');
                        $('#btnSubmitJawaban').hide()
                    }
                  })

                
            } else {
                
            }
        },
        dataType: 'json'
    })
}