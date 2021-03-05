@include('User.Layout.head')

<style>
    .costum_file_container {
        display: flex;

  align-items: center;
    }
</style>

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Detail Materi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pelajaran</a></li>
                                <li class="breadcrumb-item active">Materi</li>
                                <li class="breadcrumb-item active">Detail Materi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end page title -->
            <div class="row" id="generateAbsensi">

            </div>
            <div class="row" >
                <div class="col-md-12">
                    <div class="card p-5" >
                        <div class="col-md-12 text-center" style="font-size: 20px;" id="namaMateri">

                        </div>
                        <div class="col-md-12" id="generateMateriText">

                        </div>
                        <div class="col-md-12 pt-3 mb-3 text-center border-top" style="font-size: 20px; ">
                            File Materi
                        </div>
                        <div class="col-md-12" id="generateFileMateri">
                            
                        </div>
                        <div class="col-md-12 text-center mt-5" style="font-size: 20px;">
                            <a id="btnSoals" type="button" onclick="redirectSoal()" style="width: 100%; color: white;" class="btn btn-danger w-xs waves-effect waves-light">Soal <i class="ri-arrow-right-line align-middle ml-2 "></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('User.Layout.footer')
    <script src="{{url('assets/js')}}/user/detail_materi.js"></script>
</div>