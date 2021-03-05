<?php

namespace App\Http\Controllers\Guru;
use App\Http\Controllers\GuruControllers as Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriControllers extends Controller
{
   public function redirectMateri()
   {
        return view('Guru.Pages.materi');
   }

   public function get_materi($id)
   {
       $query = Materi::where('id_pelajaran', $id)->get();

       return response()->json([
            '_status' => 200,
            '_data' => $query
        ]);
   }

   public function redirectAddMateri()
   {
          return view('Guru.Pages.tambah_materi');
   }
}
