@include('Guru.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

           <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">@@Guru</h4>

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
                <div class="col-lg-12 mb-4 text-right">
                    <a href="{{ url('guru/tambah_kelas') }}" style="width: 20%;" class="btn btn-info w-xs waves-effect waves-light">Tambah Kelas<i class="ri-checkbox-circle-line align-middle ml-2 "></i></a>
                </div>
            </div>
            <!-- end page title -->
            <div class="row" id="generateKelas">
                
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/kelas.js"></script>
</div>