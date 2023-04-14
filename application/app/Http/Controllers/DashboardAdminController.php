<?php

namespace App\Http\Controllers;

use App\Models\{Post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $date = date('Y-m-d');
        $aspirasi_now = DB::table('aspirasi')->whereDate('created_at', '=', $date)->get();
        $aspirasi_total = DB::table('aspirasi')->get();
        $warta = DB::table('posts')->get();
        $rapat = DB::table('rapats')->get();
        $data = [
            'aspirasi_now' => $aspirasi_now->count(),
            'aspirasi_total' => $aspirasi_total->count(),
            'warta' => $warta->count(),
            'rapat' => $rapat->count(),
        ];
        return view('admin/v_dashboard', compact('data'));
    }

   
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        
        DB::table('users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'position' => $request->position,
            'email' => $request->email,
            'password' => Hash::make('12345678')
        ]);

        return redirect('user')->with('status', 'User Berhasil Di Entri!');
    }

   
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.show', compact('user'));
    }

    
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view('user.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $data = User::where('id', $id)->first();

        if (password_verify($request->password, $data->password) AND $request->new_password == $request->confirm_password) 
        {
            $update = User::where('id', $id)
                    ->update([
                        'password' => Hash::make($request->new_password)
                    ]);
                
            if($update)
            {
                return redirect('/')->with('status', 'Password berhasil diubah');
            }
            else
            {
                return redirect('/')->with('status_error', 'Password gagal diubah');
            }
        }
        else if($request->new_password == $request->confirm_password) 
        {
            return redirect('/')->with('status_error', 'Password gagal diubah!!, password tidak sesuai');
        }
        else
        {
            return redirect('/')->with('status_error', 'Password salah');
        }
        
    }

    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('user')->with('status', 'User Berhasil DiHapus!');
    }
}
