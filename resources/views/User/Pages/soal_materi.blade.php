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

           <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0">@@detail</h4>

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
                <div class="col-12">
                    <div class="card" style="width: 100%;" id="generateSoal">
                        <form id="jawabanTest">

                        </form>
                    </div>
                </div>
                <div class="col-12" id="generateButtonSubmit">
                    
                </div>
            </div>
            <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    @include('User.Layout.footer')
    <script src="{{url('assets/js')}}/user/soal_materi.js"></script>
</div>