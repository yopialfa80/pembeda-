@include('User.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <form id="perbaruiProfile">
            <div class="row">
                <div class="col-md-3">
                    <img id="image_profile" style="width: 100%;" src="data:image/jpeg;base64,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" alt="" />
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

    @include('User.Layout.footer')
    <script src="{{url('assets/js')}}/user/profile.js"></script>
</div>