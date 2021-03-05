<?php

namespace App\Http\Controllers\Guru;
use App\Http\Controllers\GuruControllers as Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\MFileHelper;
use App\Models\MJawabanHelper;
use App\Models\MSoalHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class KelasControllers extends Controller
{
    public function kelas()
    {
        return view('Guru.Pages.kelas');
    }

    public function tambah_kelas()
    {
        return view('Guru.Pages.tambah_kelas');
    }

    public function create_kelas(Request $request)
    {

        $picture = $this->uploadFile($request->picture);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'deskripsi_kelas' => $request->deskripsi_kelas,
            'gambar_kelas' => $picture,
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'Kelas berhasil di tambahkan',
        ]);
    }
    
    public function redirectDetailKelas()
    {
        return view('Guru.Pages.detail_kelas');
    }

    public function get_user($id_kelas)
    {
        $query = User::where('id_kelas', $id_kelas)->get();
        return response()->json([
            '_status' => 200,
            '_message' => 'Kelas berhasil di tambahkan',
            '_data' => $query
        ]);
    }

    public function get_user_class()
    {
        $query['user'] = User::get();

        for ($i=0; $i < count($query['user']); $i++) { 
            $query['kelas'][$i] = Kelas::where('id', $query['user'][$i]->id_kelas)->first();
        }

        return response()->json([
            '_status' => 200,
            '_message' => 'Kelas berhasil di tambahkan',
            '_data' => $query
        ]);
    }

    public function add_user_class(Request $request)
    {
        User::where('id' ,$request->id)->update([
            'id_kelas' => $request->id_kelas
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'User berhasil di daftarkan di kelas ini',
        ]);
    }

    public function redirectDetailMateri()
    {
        return view('Guru.Pages.detail_materi');
    }

    public function get_detailmateri($id_materi)
    {
        $query['materi'] = Materi::where('id', $id_materi)->first();

        $query['absen'] = Absensi::where([['id_materi' , $query['materi']->id], ['id_siswa', Auth::user()->id]])->first();

        $query['materi_file'] = MFileHelper::where('unique_id_materi', $query['materi']->unique_id)->get();

        $query['soal'] = MSoalHelper::where('unique_id_materi', $query['materi']->unique_id)->get();
       if ($query['absen'] != null) {
            return response()->json([
                '_status' => 200,
                '_data' => $query,
                '_message' => 'telah absen',
            ]);
       }

        return response()->json([
            '_status' => 200,
            '_data' => $query,
            '_message' => 'belum absen',
        ]);
    }

    public function redirectProfileGuru()
    {
        return view('Guru.Pages.profile');
    }

    public function updateProfileGuru(Request $request)
    {
        
    }

    public function get_siswamateri($id_materi)
    {
        $jawaban = MJawabanHelper::where('unique_id_materi', $id_materi)->get();

        $userCheck = '';
        $query = [];
        for ($i=0; $i < count($jawaban); $i++) {
            if ($userCheck != $jawaban[$i]->id_user) {
                $userCheck = $jawaban[$i]->id_user;
                $query[$i] = User::where('id', $jawaban[$i]->id_user)->first();
            }
        }

        return response()->json([
            '_status' => 200,
            '_data' => $query,
            '_message' => 'belum absen',
        ]);

    }

    public function redirectJawaban()
    {
        return view('Guru.Pages.jawaban_user');
    }

    public function get_detail_jawaban(Request $request)
    {
        $query['soal'] = MJawabanHelper::where([['unique_id_materi', $request->uniqid_id],['id_user', $request->id_user]])->get();

        return response()->json([
            '_status' => 200,
            '_data' => $query,
            '_message' => 'belum absen',
        ]);
    }

    public function get_user_add_class($id_kelas)
    {
        $query['user'] = User::where('id_kelas', '!=', $id_kelas)->get();

        for ($i=0; $i < count($query['user']); $i++) { 
            $query['kelas'][$i] = Kelas::where('id', $query['user'][$i]->id_kelas)->first();
        }

        return response()->json([
            '_status' => 200,
            '_message' => 'Kelas berhasil di tambahkan',
            '_data' => $query
        ]);
    }
}
