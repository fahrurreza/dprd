<?php

namespace App\Http\Controllers;

use App\Models\Visimisi;
use Illuminate\Http\Request;
use Validator;
use DB;

class VisimisiController extends Controller
{
    public function index()
    {
        $data = [
            'visi' => Visimisi::where('jenis', 'visi')->get(),
            'misi' => Visimisi::where('jenis', 'misi')->get(),
        ];
        return view('admin/v_visimisi', compact('data'));
    }



    //POST
    public function createVisimisi(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'deskripsi' => 'required'
        ]);

        if ($validator->passes()) 
         {
            $insert = DB::table('visimisi')->insert([
                'deskripsi' => $request->deskripsi,
                'jenis'     => $request->jenis
            ]);
    
            if($insert)
            {
                toastr()->success('Data berhasil ditambahkan.');
                return back();
            }
            else
            {
                toastr()->error('Data gagal ditambahkan.');
                return back();
            }
         }
         else
         {
            toastr()->error('Gagal input, Form harus di isi penuh');
            return back();
         }
    }

    public function deleteVisimisi(Request $request)
    {
        $delete = Visimisi::destroy($request->id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

    public function updateVisimisi(Request $request)
    {
        $update = Visimisi::where('id', $request->id)
                    ->update([
                        'deskripsi'       => $request->deskripsi,
                        'jenis'       => $request->jenis,
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
}
