<?php

namespace App\Http\Controllers\Guru;
use App\Http\Controllers\GuruControllers as Controller;
use App\Models\Kelas;
use App\Models\Materi;
use App\Models\MFileHelper;
use App\Models\MSoalHelper;
use App\Models\Pelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelajaranControllers extends Controller
{
    public function redirectPelajaran()
    {
        return view('Guru.Pages.pelajaran');
    }

    public function get_pelajaran()
    {
        $query['pelajaran'] = Pelajaran::get();

        $query['kelas'] = [];
        for ($i=0; $i < count($query['pelajaran']); $i++) { 
            $query['kelas'][$i] = Kelas::where('id', $query['pelajaran'][$i]->id_kelas)->first();
        }
        

        return response()->json([
            '_status' => 200,
            '_message' => 'Kelas berhasil di tambahkan',
            '_data' => $query
        ]);
    }

    public function redirectAddPelajaran()
    {
        return view('Guru.Pages.tambah_pelajaran');
    }

    public function tambah_pelajaran(Request $request)
    {

        $gambar_pelajaran = $this->uploadFile($request->gambar_pelajaran);
        Pelajaran::create([
            'id_kelas' => $request->id_kelas,
            'nama_pelajaran' => $request->nama_pelajaran,
            'deskripsi_pelajaran' => $request->deskripsi_pelajaran,
            'gambar_pelajaran' => $gambar_pelajaran,
            'id_guru' => Auth::user()->id
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'Pelajaran berhasil di tambahkan',
        ]);
    }

    public function tambah_materi(Request $request)
    {

        $gambar_materi = $this->uploadFile($request->gambar_materi);
        Materi::create([
            'id_pelajaran' => $request->id_pelajaran,
            'unique_id' => $request->unique_id,
            'nama_materi' => $request->nama_materi,
            'deskripsi_materi' => $request->deskripsi_materi,
            'gambar_materi' => $gambar_materi,
            'tanggal_dibuka' => $request->tanggal_dibuka,
            'absen_mulai' => $request->absen_mulai,
            'absen_berakhir' => $request->absen_berakhir,
            'text_materi' => $request->text_materi,
        ]);

        for ($i=0; $i < count($request->file); $i++) {
            MFileHelper::create([
                'unique_id_materi' => $request->unique_id,
                'file' => $this->uploadFile($request->file[$i])
            ]);
        }

        if ($request->tipe_soal == 'essay') {
            for ($i=0; $i < count($request->soal); $i++) {
                MSoalHelper::create([
                    'unique_id_materi' => $request->unique_id,
                    'tipe_soal' => $request->tipe_soal,
                    'soal' => $request->soal[$i],
                    'jawaban_benar' => $request->jawaban_benar[$i],
                ]);
            }
        } else {
            for ($i=0; $i < count($request->soal); $i++) {
                MSoalHelper::create([
                    'unique_id_materi' => $request->unique_id,
                    'tipe_soal' => $request->tipe_soal,
                    'soal' => $request->soal[$i],
                    'jawaban_benar' => $request->jawaban_benar[$i],
                    'jwb_a' => $request->jwb_a[$i],
                    'jwb_b' => $request->jwb_b[$i],
                    'jwb_c' => $request->jwb_c[$i],
                    'jwb_d' => $request->jwb_d[$i],
                ]);
            }
        }

        return response()->json([
            '_status' => 200,
            '_message' => 'Materi berhasil di tambahkan',
        ]);
    }
}
