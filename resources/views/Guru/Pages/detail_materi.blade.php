@include('Guru.Layout.head')

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

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Justify Tabs</h4>
                        <p class="card-title-desc">Use the tab JavaScript plugin—include
                            it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                            file—to extend our navigational tabs and pills to create tabbable panes
                            of local content, even via dropdown menus.</p>

                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Detail Materi</span> 
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Progres Pengerjaan Soal</span> 
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="home-1" role="tabpanel">
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
                                            <div class="col-md-12 pt-3 mb-3 text-center border-top" style="font-size: 20px; ">
                                                Soal
                                            </div>
                                            <div class="col-md-12" id="generateSoal">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
        
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>NIS / NISN</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="generateSiswa">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row" id="generateAbsensi">

            </div>
            
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/detail_materi.js"></script>
</div>