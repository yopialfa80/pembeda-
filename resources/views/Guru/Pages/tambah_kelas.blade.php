@include('Guru.Layout.head')

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
                                <form class="needs-validation" novalidate id="tambahKelas">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom01">Nama Kelas</label>
                                                <input type="text" class="form-control" id="validationCustom01" name="nama_kelas" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="validationCustom02">Deskripsi Kelas</label>
                                                <input type="text" class="form-control" id="validationCustom02" name="deskripsi_kelas" required>
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
                                                    <input type="file" class="custom-file-input" id="customFile" name="picture">
                                                    <label class="custom-file-label" for="customFile">Pilih gambar kelas</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="{{url('assets/js')}}/guru/tambah_kelas.js"></script>
    <script src="{{url('assets/libs')}}/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="{{url('assets/js')}}/pages/form-element.init.js"></script>
</div>