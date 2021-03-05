@include('User.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

           <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Pelajaran</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pelajaran</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row" id="generateKelas">
                
                
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <button type="button" id="openModalPass" style="visibility: hidden" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#staticBackdrop">Static backdrop</button>

    <div class="modal fade bs-example-modal-center" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Absensi Kelas</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="example-text-input" class="col-md-6 col-form-label">Ubah password default</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" placeholder="Password baru anda disini ..." id="new_password">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="perbaruiPassword()" class="btn btn-primary waves-effect waves-light">Perbarui Password</button>
                </div>
            </div>
        </div>
    </div>

    @include('User.Layout.footer')
    <script>    
        var sites = {!! json_encode($data) !!};
    </script>
    <script src="{{url('assets/js')}}/user/pelajaran.js"></script>
</div>