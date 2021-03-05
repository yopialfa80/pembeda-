@include('Guru.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <form id="perbaruiProfile">
            <div class="row">
                <div class="col-md-3">
                    <img id="image_profile" name="picture" style="width: 100%;" src="" alt="" />
                    <label for="validationCustom01">Foto Profile</label>
                    <input type="file" class="form-control" id="picture" name="picture" required>
                </div>
                <div class="col-md-9">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom01">Nama</label>
                            <input type="text" class="form-control" id="nama" name="name" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom01">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom02">Jenis Kelamin</label>
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="validationCustom01">Agama</label>
                            <input type="text" class="form-control" id="agama" name="agama" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button onclick="perbaruiProfile()" type="button" style="width: 100%" class="btn btn-info w-xs waves-effect waves-light">Perbarui Profile<i class="ri-arrow-right-line align-middle ml-2 "></i></button>
                </div>
            </div>
        </form>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/profile.js"></script>
</div>