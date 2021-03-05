function getProfile() {
    $.ajax({
        url: ServeUrl + '/user/get_profile',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'GET',
        dataType: 'json',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                
                console.log('response', response)

                var data = response.responseJSON._data.user;

                $('#nama').val(data.name);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#agama').val(data.agama);
                $('#image_profile').attr('src', BaseUrl + '/assets/images/users/' + data.picture);

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
getProfile()

function perbaruiProfile() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var form = $('#perbaruiProfile')[0];
    var request = new FormData(form);
    request.append("_token", csrf_token );
    
    $.ajax({
        data: request,
        url: ServeUrl + '/user/profile/perbarui',
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        type: 'POST',
        dataType: 'json',
        complete: function(response) {
            if (response.responseJSON._status == 200) {
                
                Swal.fire({
                    type: "success",
                    title: 'Woah!',
                    html: '<p class="card-text"><small class="text-muted"><b>Hmm...</b> sepertinya kamu melakukan sesuatu.<br> Perintah yang baru saja kamu lakukan <b>berhasil</b> di proses.</small></p>',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    background: '#fff',
                    confirmButtonText: '<i style="padding-right: 10px;" class="fa fa-check"></i>Ya, Baiklah!',
                    confirmButtonClass: 'btn btn-success',
                    buttonsStyling: false,
                    onClose: function() {
                        
                    }
                })

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