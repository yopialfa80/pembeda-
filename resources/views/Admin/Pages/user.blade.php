@include('Admin.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title pb-5">Tambah User</h4>

                            <form id="createNewUser">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control form-control-md" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control form-control-md" type="text" name="username" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control form-control-md" type="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NIS / NISN</label>
                                        <input class="form-control form-control-md" type="text" name="nis_nisn" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input class="form-control form-control-md" type="date" name="tanggal_lahir" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input class="form-control form-control-md" type="text" name="tempat_lahir" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="custom-select" name="jenis_kelamin" required>
                                            <option selected value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <input class="form-control form-control-md" type="text" name="agama" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="custom-select" name="roles" required>
                                            <option selected value="User">Siswa</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto Profile</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="picture">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding-top: 20px;">
                                    <button style="width: 100%;" type="submit" class="btn btn-info w-xs waves-effect waves-light">Buat User Baru<i class="ri-checkbox-circle-line align-middle ml-2 "></i></button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title pb-5">Daftar User</h4>
                            <div class="table-responsive">
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Foto Profile</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>NIS / NISN</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tempat Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th></th>
                                </tr>
                                </thead>


                                <tbody id="generateUser">


                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div id="showPass" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="mySmallModalLabel">Ubah Password User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Password baru anda disini ..." id="new_password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" onclick="submitPasswordChange()" class="btn btn-primary waves-effect waves-light">Perbarui Password</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Admin.Layout.footer')
    <script src="{{url('assets/js')}}/admin/user.js"></script>

    <script src="{{url('assets/libs')}}/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{url('assets/libs')}}/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{url('assets/libs')}}/jszip/jszip.min.js"></script>
    <script src="{{url('assets/libs')}}/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{url('assets/libs')}}/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-buttons/js/buttons.colVis.min.js"></script>

    <script src="{{url('assets/libs')}}/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-select/js/dataTables.select.min.js"></script>
    
    <!-- Responsive examples -->
    <script src="{{url('assets/libs')}}/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{url('assets/libs')}}/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    {{-- <script src="{{url('assets/js')}}/pages/datatables.init.js"></script> --}}
</div>