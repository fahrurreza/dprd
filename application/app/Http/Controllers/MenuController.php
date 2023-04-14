<?php

namespace App\Http\Controllers;


use App\Models\{Menu, Submenu, Role};
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;

class MenuController extends Controller
{
    // GET METHOD

    public function index()
    {
        $data = [
            'menus'      => Menu::all(),
        ];
        return view('admin.v_menu', compact('data'));
    }

    public function showSubmenu(Request $request)
    {
        if($request->ajax())
        {
            $submenus=Submenu::where('menu_id', $request->id)->get();

            if(count($submenus) == 0)
            {
                $output = 'Submenu not found';
                return Response($output);
            }
            else
            {

                foreach ($submenus as $submenu) 
                {
                    
                        $button = '<i class="remove ti-close" onclick="deleteSubmenu('.$submenu->id.')"></i>';
                    
                        $output[] ='<li> <div class="form-check form-check-flat">'.$submenu->submenu.'</div>'.$button.'</li>';
                }

                return Response($output);
            }
        }
    }

    public function editMenu(Request $request)
    {
        if($request->ajax())
        {
            $menu = Menu::where('id', $request->id)->first();
            return Response($menu);
        }
    }

    public function roleMenu()
    {
        $role_id = Auth::user()->role_id;

        if($role_id == 1)
        {
            $role = Role::all();
        }
        else
        {
            $role = Role::where('id', '!=', 1)->get();
        }

        $data = [
            'roles'         => $role,
        ];
        return view('admin.v_rolemenu', compact('data'));
    }

    

    public function accessMenu(Request $request)
    {

        if($request->ajax())
        {
            $menus = Menu::all();
            

            foreach($menus as $menu)
            {
                if(count(getAccess($menu->id, $request->id)) > 0)
                {
                    $checked = 'checked';
                }
                else
                {
                    $checked = '';
                }   
                $output[] = '<div class="col">'.
                                '<div class="form-check">'.
                                    '<input class="form-check-input" type="checkbox" onclick="createAccess('.$menu->id.')" value="'.$menu->id.'" id="menu"'.$menu->id.'"'.
                                    '<label class="form-check-label" for="flexCheckDefault" '.$checked.'>'.
                                        $menu->menu.
                                    '</label>'.
                                '</div>'.
                            '</div>';
                
                
            }

            return Response($output);
        }
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

    public function createMenu(Request $request)
    {
        $insert = DB::table('menus')->insert([
            'menu' => $request->menu,
            'icon' => $request->icon,
            'route' => $request->route
        ]);

        if($insert)
        {
            toastr()->success('Menu berhasil ditambahkan.');
            return back();
        }
        else
        {
            toastr()->error('Menu gagal ditambahkan.');
            return back();
        }
    }

    public function createAccess(Request $request)
    {
        $cek = DB::table('menu_role')
                        ->where('menu_id', $request->menu_id)
                        ->where('role_id', $request->role_id)
                        ->first();
        
        if($cek)
        {
            $delete = DB::table('menu_role')->delete($cek->id);

            if($delete)
            {
                toastr()->success('Access berhasil dihapus.');
                return back();
            }
            else
            {
                toastr()->error('Access gagal dihapus.');
                return back();
            }
        }
        else
        {
            $insert = DB::table('menu_role')->insert([
                'menu_id' => $request->menu_id,
                'role_id' => $request->role_id,
            ]);

            if($insert)
            {
                toastr()->success('Access berhasil ditambahkan.');
                return back();
            }
            else
            {
                toastr()->error('Access gagal ditambahkan.');
                return back();
            }
        }
    }

    public function updateMenu(Request $request)
    {
        $update = Menu::where('id', $request->menu_id)
                    ->update([
                        'menu'       => $request->menu,
                        'icon'       => $request->icon,
                        'route'      => $request->route,
                    ]);

        if($update)
        {
            toastr()->success('Menu berhasil update.');
            return back();
        }
        else
        {
            toastr()->error('Menu gagal update.');
            return back();
        }
    }

    public function createSubmenu(Request $request)
    {
        $insert = DB::table('submenus')->insert([
            'menu_id' => $request->menu_id,
            'submenu' => $request->submenu,
            'route' => $request->route
        ]);

        if($insert)
        {
            toastr()->success('Submenu berhasil ditambahkan.');
            return back();
        }
        else
        {
            toastr()->error('Submenu gagal ditambahkan.');
            return back();
        }
    }

    public function deleteMenu(Request $request)
    {
        $delete = Menu::destroy($request->menu_id);

        if($delete){
            toastr()->success('Menu berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Menu gagal dihapus.');
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

    public function deleteSubmenu(Request $request)
    {
        $delete = Submenu::destroy($request->submenu_id);

        if($delete){
            toastr()->success('Submenu berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Submenu gagal dihapus.');
            return back();
        }
    }

}
