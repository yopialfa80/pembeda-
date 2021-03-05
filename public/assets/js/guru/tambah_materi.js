
function generateSoal() {
    
    var tipeSoal = $('#tipeSoal').val();

    var html = '';
    var number = 1;
    switch (tipeSoal) {
        case 'ganda':
            
            for (let i = 0; i < $('.jumlahSoalGen').val(); i++) {
        
                html += '<div class="row border-top border-bottom mt-1 mb-3 pb-3">';
                html += '<div class="col-md-8">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Soal '+number+'" class="form-control" id="validationCustom02" name="soal[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-4">';
                html += '<label for="validationCustom02"></label>';
                html += '<select name="jawaban_benar[]" class="form-control">';
                html += '<option>Jawaban Benar</option>';
                html += '<option value="jwb_a">A</option>';
                html += '<option value="jwb_b">B</option>';
                html += '<option value="jwb_c">C</option>';
                html += '<option value="jwb_d">D</option>';
                html += '</select>';
                html += '</div>';
                html += '<div class="col-md-3">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Jawaban A" class="form-control" id="validationCustom02" name="jwb_a[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-3">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Jawaban B" class="form-control" id="validationCustom02" name="jwb_b[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-3">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Jawaban C" class="form-control" id="validationCustom02" name="jwb_c[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-3">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Jawaban D" class="form-control" id="validationCustom02" name="jwb_d[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                number++;
            }

            break;
        case 'essay':

            for (let i = 0; i < $('.jumlahSoalGen').val(); i++) {
                html += '<div class="row border-top border-bottom mt-1 mb-3 pb-3" >';
                html += '<div class="col-md-12 mb-2">';
                html += '<label for="validationCustom02"></label>';
                html += '<input type="text" placeholder="Soal '+number+'" class="form-control" id="validationCustom02" name="soal[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '<div class="col-md-12">';
                html += '<input type="text" placeholder="Jawaban" class="form-control" id="validationCustom02" name="jawaban_benar[]" required>';
                html += '<div class="valid-feedback">';
                html += 'Looks good!';
                html += '</div>';
                html += '</div>';
                html += '</div>';
                number++;
            }
        
            break;
    
        default:
            break;
    }
    $('#generateSoal').html(html);
    
}
var id_pelajaran = window.location.pathname.split('/').pop();
var csrf_token = $('meta[name="csrf-token"]').attr('content');
$("#createMateri").submit(function(event) {
    event.preventDefault();

    var form = $('#createMateri')[0];
    var data = new FormData(form);
    data.append("id_pelajaran", id_pelajaran);
    data.append("text_materi", tinyMCE.activeEditor.getContent());
    data.append("unique_id", makeRandomText(100));
    data.append("_token", csrf_token );
    $.ajax({
        data: data,
        url: ServeUrl + "/guru/tambah_materi",
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        complete: function(response) {

            console.log('elm1', );
            if (response.responseJSON._status == 200) {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil !',
                    text: response.responseJSON._message,
                    confirmButtonColor: "#0D6EFD",
                    confirmButtonText: 'Baiklah',
                    onClose: function() {
                        window.location.href = BaseUrl + '/guru/materi/' + id_pelajaran;
                    }
                  })
            } else {
                console.log('error')
            }
        },
        dataType: 'json'
    })
});

function makeRandomText(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }