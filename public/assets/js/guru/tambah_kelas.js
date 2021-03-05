$("#tambahKelas").submit(function(event) {
    event.preventDefault();
    
    var form = $('#tambahKelas')[0];
    var data = new FormData(form);
    $.ajax({
        data: data,
        url: ServeUrl + "/guru/tambah_kelas",
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
                        window.location.href = BaseUrl + '/guru/kelas';
                    }
                  })
            } else {
                console.log('error')
            }
        },
        dataType: 'json'
    })
});