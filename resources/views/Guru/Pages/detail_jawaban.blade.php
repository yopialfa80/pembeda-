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

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('Guru.Layout.footer')
    <script src="{{url('assets/js')}}/guru/detail_materi.js"></script>
</div>