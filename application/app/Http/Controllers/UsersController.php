<?php

namespace App\Http\Controllers;

use App\Models\{User, Role};
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role_id = Auth::user()->role_id;

        if($role_id == 1)
        {
            $role = Role::all();
            $user = DB::table('users')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->get();
        }
        else
        {
            $user = DB::table('users')
                        ->join('roles', 'users.role_id', '=', 'roles.id')
                        ->where('user_id', '!=', 1)
                        ->get();
            $role = Role::where('id', '!=', 1)->get();
            
        }

        $data = [
            'users'     => $user,
            'role'      => $role,
        ];
        return view('admin.v_user', compact('data'));
    }


    //POST METHOD

    public function createRole(Request $request)
    {
        $insert = DB::table('roles')->insert([
            'role' => $request->role,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);

        if($insert)
        {
            toastr()->success('Role berhasil ditambahkan.');
            return back();
        }
        else
        {
            toastr()->error('Role gagal ditambahkan.');
            return back();
        }
    }

    public function createUser(Request $request)
    {
        
        // $validatedData = $request->validate([
        //     'email' => 'unique:users',
        //     'username' => 'unique:users',
        // ]);

        $insert = DB::table('users')->insert([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make('12345678'),
            'role_id' => $request->role_id
        ]);


        if($insert)
        {
            toastr()->success('User berhasil ditambahkan.');
            return back();
        }
        else
        {
            toastr()->error('User gagal ditambahkan.');
            return back();
        }
    }

    public function deleteRole(Request $request)
    {
        
            $delete = Role::destroy($request->role_id);

            if($delete){
                toastr()->success('Role berhasil dihapus.');
                return back();
            }
            else{
                toastr()->error('Role gagal dihapus.');
                return back();
            }
    }

    public function dataregistrasi()
    {
        $data = [
            'regiter' => User::where('role_id', 4)->get()
        ];

        return view('admin.v_register', compact('data'));
    }

    public function register_accept($slack)
    {
        $update = User::where('id', $slack)
                            ->update([
                                'status' => true
                            ]);

        if($update)
        {
            toastr()->success('User diterima');
            return back();
        }
        else
        {
            toastr()->error('User diterima');
            return back();
        }
    }

    public function register_delete($slack)
    {
        $delete = DB::table('users')->where('id', $slack)->delete();

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

}
