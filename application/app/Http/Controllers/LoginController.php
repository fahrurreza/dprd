<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as UserModel;
use Hash;
use Auth;
use Validator;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'username'     => ['required', 'username'],
        //     'password'  => ['required']
        // ]);

        $user = UserModel::where('username', $request->username)->orWhere('email', $request->username)->first();
        

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                

                if($user->role_id == 4)
                {
                    if($user->status == true){
                        Auth::login($user);
                        toastr()->success('Login berhasil!');
                        return Redirect('/');
                    }else{
                        toastr()->error('Akun anda belum diaktifkan!');
                        return back();
                    }
                }
                else
                {
                    Auth::login($user);
                    toastr()->success('Login berhasil!');
                    return Redirect('admin');
                }
            }
            else
            {
                toastr()->error('Login gagal!');
                return back();
            }
        }
        else
        {
            toastr()->error('Login gagal!');
            return back();
        }
    }

    public function registrasi()
    {
        return view('auth.registrasi');
    }

    public function storeregistrasi(Request $request)
    {

        if($request->password_confirm != $request->password)
        {
            toastr()->error('Password tidak sesuai!');
            return back();
        }

        if(strlen($request->nik) > 16)
        {
            toastr()->error('nik lebih 16 karakter!');
            return back();
        }
        
        $insert = DB::table('users')->insert([
            'name' => $request->name,
            'nik' => $request->nik,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => 4,
            'status' => 0,
            'created_at' => now()
        ]);

        if($insert)
        {
            toastr()->success('Data anda berhasil didaftarkan, silahkan tunggu 1 x 24 jam untuk pengaktifan akun anda, karena akan berpengaruh kepada kevalidan data anda');
            return back();
        }
        else
        {
            toastr()->error('Data gagal ditambahkan.');
            return back();
        }


    }

    public function change_password()
    {
        $data = [
            'page'  => 'Change Password',
        ];
        return view('admin.v_change_password', compact('data'));
    }

    public function update_password(Request $request)
    {
        if($request->password_confirm != $request->password_new)
        {
            toastr()->error('Password tidak sama!!.');
            return back();
        }
        
        $user = UserModel::where('id', Auth::user()->id)->first();

        if($user)
        {
            if(Hash::check($request->password, $user->password))
            {
                $data_update = [
                    'password' => Hash::make($request->password_new),
                ];
                
                $update = UserModel::where('id', Auth::user()->id)->update($data_update);

                toastr()->success('Password berhasil di update!');
                return Redirect('admin');
            }
            else
            {
                toastr()->error('Password tidak sesuai!');
                return back();
            }
        }
        else
        {
            toastr()->error('Password gagal update!');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return Redirect('/');
    }
}
