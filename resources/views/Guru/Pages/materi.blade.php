@include('Guru.Layout.head')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

           <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">Materi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pelajaran</a></li>
                                <li class="breadcrumb-item active">Materi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mb-4 text-right" id="btnTambahMateri">
                    
                </div>
            </div>
            <!-- end page title -->
            <div class="row" id="generateMateri">
                
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/materi.js"></script>
</div>