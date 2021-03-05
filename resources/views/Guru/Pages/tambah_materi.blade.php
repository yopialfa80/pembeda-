@include('Guru.Layout.head')
<link href="{{url('assets/libs')}}/summernote/summernote-bs4.min.css" rel="stylesheet" type="text/css" />
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

           <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">@@ss</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">@@pagetitle</a></li>
                                <li class="breadcrumb-item active">@@title</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bootstrap Validation - Normal</h4>
                                <p class="card-title-desc">Provide valuable, actionable feedback to your users with HTML5 form validation–available in all our supported browsers.</p>
                                <form class="needs-validation" novalidate id="createMateri">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom01">Nama Materi</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="nama_materi" value="Pengertian Bahasa Alien" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Deskripsi Materi</label>
                                                <input type="text" class="form-control" id="validationCustom02" value="This is a wider card with supporting text below as a natural lead-in to additional content." name="deskripsi_materi" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="gambar_materi">
                                                    <label class="custom-file-label" for="customFile">Pilih gambar materi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Tanggal Materi Dibuka</label>
                                                <input class="form-control" type="date" value="2020-03-19" id="example-date-input" name="tanggal_dibuka">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Waktu Absen Dibuka</label>
                                                <input class="form-control" type="time" value="07:00:00" id="example-time-input" name="absen_mulai">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Waktu Absen Ditutup</label>
                                                <input class="form-control" type="time" value="09:00:00" id="example-time-input" name="absen_berakhir">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="validationCustom02">Text Materi</label>
                                                <textarea id="elm1"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="file[]" multiple>
                                                    <label class="custom-file-label" for="customFile">Pilih beberapa file materi</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="validationCustom02">Tambahkan Soal</label>
                                    <div class="row ">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <select id="tipeSoal" class="form-control" name="tipe_soal">
                                                    <option>Pilih jenis soal</option>
                                                    <option value="ganda">Pilihan Ganda</option>
                                                    <option value="essay">Essay</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input placeholder="Jumlah soal" class="form-control jumlahSoalGen" name="jumlah_soal" type="number" id="example-time-input">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <button class="btn btn-danger" type="button" onclick="generateSoal()" style="width: 100%" type="submit">Generate Soal</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="generateSoal"></div>
                                    <button class="btn btn-primary" type="submit">Tambahkan Kelas</button>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->

                </div>
            </div>

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/tambah_materi.js"></script>
    <script src="{{url('assets/libs')}}/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="{{url('assets/js')}}/pages/form-element.init.js"></script>
    <script src="{{url('assets/libs')}}/tinymce/tinymce.min.js"></script>
    <script src="{{url('assets/libs')}}/summernote/summernote-bs4.min.js"></script>
    
    <script src="{{url('assets/js')}}/pages/form-editor.init.js"></script>
    
    
</div>