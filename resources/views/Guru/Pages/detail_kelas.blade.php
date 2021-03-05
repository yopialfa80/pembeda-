@include('Guru.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 mb-4 text-right">
                    <a onclick="addUser()" style="width: 20%; color: white;" class="btn btn-info w-xs waves-effect waves-light">Tambah Siswa di Kelas ini<i class="ri-checkbox-circle-line align-middle ml-2 "></i></a>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12 mb-4 text-right">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title pb-5">User terdaftar pada kelas ini</h4>

                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>NIS / NISN</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
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

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <div class="modal fade bs-example-modal-center" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Siswa di Kelas ini</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Kelas Terdaftar</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="generateUsers">
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Batalkan</button>
                </div>
            </div>
        </div>
    </div>

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/detail_kelas.js"></script>
</div>