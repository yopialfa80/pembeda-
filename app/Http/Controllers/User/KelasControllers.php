<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\UserControllers as Controller;
use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\MFileHelper;
use App\Models\MJawabanHelper;
use App\Models\MSoalHelper;
use App\Models\Pelajaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class KelasControllers extends Controller
{
    public function redirectKelas()
    {
        return view('User.Pages.kelas');
    }

    public function get_kelas()
    {
        $query = Kelas::get();
        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function redirectPelajaran()
    {
        $data["user"] = Auth::user();
        return view('User.Pages.pelajaran',compact('data'));
    }

    public function get_pelajaran()
    {
        $query = Pelajaran::where('id_kelas', Auth::user()->id_kelas)->get();
        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function redirectMateri()
    {
        return view('User.Pages.materi');
    }

    public function get_materi($id_pelajaran)
    {
        $query = Materi::where('id_pelajaran', $id_pelajaran)->get();
        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function check_absen(Request $request)
    {
        $query = Absensi::where([['id_kelas', $request->id_kelas],['id_siswa', Auth::user()->id],['tanggal', $request->tanggal],['hari', $request->hari]])->first();
        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function redirectDetailMateri()
    {
        return view('User.Pages.detail_materi');
    }

    public function get_detailmateri($id_materi)
    {
        $query['materi'] = Materi::where('id', $id_materi)->first();

        $query['absen'] = Absensi::where([['id_materi' , $query['materi']->id], ['id_siswa', Auth::user()->id]])->first();

        $query['materi_file'] = MFileHelper::where('unique_id_materi', $query['materi']->unique_id)->get();

        $query['soal'] = MJawabanHelper::where([['unique_id_materi' , $query['materi']->unique_id], ['id_user', Auth::user()->id]])->first();

        if ($query['soal'] == null) {
            $query['soal'] = 'belum';
        } else {
            $query['soal'] = 'sudah';
        }

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

    public function absen_sekarang(Request $request)
    {
        Absensi::create([
            'id_materi' => $request->id_materi,
            'id_siswa' => Auth::user()->id,
            'nama_siswa' => Auth::user()->name,
            'waktu' => $request->waktu,
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'Kamu berhasil absen di materi ini',
        ]);
    }

    public function redirectSoalMateri()
    {
        return view('User.Pages.soal_materi');
    }

    public function get_soalmateri($id_materi)
    {

        $query['materi'] = Materi::where('id', $id_materi)->first();

        $query = MSoalHelper::where('unique_id_materi', $query['materi']->unique_id)->get();

        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function submit_jawaban(Request $request)
    {
        $query['materi'] = Materi::where('id', $request->id)->first();
        $query['soal'] = MSoalHelper::where('unique_id_materi', $query['materi']->unique_id)->get();

        for ($i=0; $i < count($query['soal']); $i++) {
            
            if ($query['soal'][0]->tipe_soal == 'ganda') {
                MJawabanHelper::create([
                    'unique_id_materi' => $query['materi']->unique_id ,
                    'id_user' => Auth::user()->id,
                    'tipe_soal' => $query['soal'][$i]->tipe_soal,
                    'soal' => $query['soal'][$i]->soal,
                    'jawaban_benar' => $query['soal'][$i]->jawaban_benar,
                    'jawaban_user' => $request->jawaban_user[$i],
                    'jwb_a' => $query['soal'][$i]->jwb_a,
                    'jwb_b' => $query['soal'][$i]->jwb_b,
                    'jwb_c' => $query['soal'][$i]->jwb_c,
                    'jwb_d' => $query['soal'][$i]->jwb_d,
                ]);
            } else {
                MJawabanHelper::create([
                    'unique_id_materi' => $query['materi']->unique_id,
                    'id_user' => Auth::user()->id,
                    'tipe_soal' => $query['soal'][$i]->tipe_soal,
                    'soal' => $query['soal'][$i]->soal,
                    'jawaban_benar' => $query['soal'][$i]->jawaban_benar,
                    'jawaban_user' => $request->jawaban_user[$i],
                ]);
            };
        }
    
        return response()->json([
            '_status' => 200,
            '_message' => 'Jawaban kamu berhasil dikirim',
        ]);
    }

    public function redirectProfile()
    {
        return view('User.Pages.profile');
    }

    public function get_profile()
    {
        $query['user'] = User::where('id', Auth::user()->id)->first();

        return response()->json([
            '_status' => 200,
            '_data' => $query,
        ]);
    }

    public function updateProfile(Request $request)
    {

        if ($request->picture != null) {
            $file = $request->picture;
            $nama_file = time()."_".$file->getClientOriginalName();
            $tujuan_upload = public_path('/assets/images/users/');
            $file->move($tujuan_upload,$nama_file);

            $query['user'] = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'picture' => $nama_file,
            ]);
        } else {
            $query['user'] = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
            ]);
        }

        return response()->json([
            '_status' => 200,
            '_message' => 'Berhasil',
        ]);
    }

    public function perbarui_pass(Request $request)
    {
        User::where('id', $request->id_user)->update([
            'password' => Hash::make($request->password),
            'status_login' => 'done'
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'Berhasil',
        ]);
    }
}