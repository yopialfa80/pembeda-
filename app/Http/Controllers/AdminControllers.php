<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminControllers extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadFile($value)
    {
        $file = $value;
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = public_path('/assets/images/data');
        $file->move($tujuan_upload,$nama_file);
        return $nama_file;
    }
}
