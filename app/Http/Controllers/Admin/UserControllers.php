<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminControllers as Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserControllers extends Controller
{
    public function redirectUser()
    {
        return view('Admin.Pages.user');
    }

    public function get_user()
    {
        $query = User::get();
        
        return response()->json([
            '_status' => 200,
            '_message' => 'User berhasil di tambahkan',
            '_data' => $query
        ]);
    }

    public function tambah_user(Request $request)
    {

        $id_kelas = '';
        if ($request->roles == 'Guru') {
            $id_kelas = 'GURU';
        } else if ($request->roles == 'Admin') {
            $id_kelas = 'ADMIN';
        } else {
            $id_kelas = 'USER';
        }

        $picture = $this->uploadFile($request->picture);
        User::create([
            'id_kelas' => $id_kelas,
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'picture' => $picture,
            'nis_nisn' => $request->nis_nisn,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'roles' => $request->roles,
            'status_login' => 'first_login',
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'User berhasil di tambahkan',
        ]);
    }

    public function reset_password(Request $request)
    {
        User::where('id', $request->id_user)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return response()->json([
            '_status' => 200,
            '_message' => 'User berhasil di tambahkan',
        ]);
    }
}
