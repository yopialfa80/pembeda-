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

                html += '<label for="validationCustom01">Nama Kelas</label>';
                html += '<select name="id_kelas" class="form-control">';
                html += '<option>Select</option>';

                for (let i = 0; i < response.responseJSON._data.length; i++) {
                    
                    html += '<option value="'+response.responseJSON._data[i].id+'">'+response.responseJSON._data[i].nama_kelas+'</option>';
                    
                }

                html += '</select>';

                $('#generateNamaKelas').html(html);

            } else if (response.responseJSON._status == 401) {

            } else if (response.responseJSON._status == 500) {

            } else {

            }
        },
        dataType: 'json'
    })
}
getKelas();

$("#tambahPelajaran").submit(function(event) {
    event.preventDefault();
    
    var form = $('#tambahPelajaran')[0];
    var data = new FormData(form);
    $.ajax({
        data: data,
        url: ServeUrl + "/guru/tambah_pelajaran",
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
                        window.location.href = BaseUrl + '/guru/pelajaran';
                    }
                  })
            } else {
                console.log('error')
            }
        },
        dataType: 'json'
    })
});