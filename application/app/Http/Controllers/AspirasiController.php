<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aspirasi;
use Auth;
use DB;
use Str;

class AspirasiController extends Controller
{
    public function index()
    {
        $aspirasi = DB::table('aspirasi')
                        ->join('users', 'aspirasi.user_id', '=', 'users.id')
                        ->select('aspirasi.*', 'users.name')
                        ->get();

        $data = [
            'aspirasi' => $aspirasi
        ];

        return view('admin/v_aspirasi', compact('data'));
    }

    public function show($slack)
    {
        $aspirasi = Aspirasi::with('user')->where('id', $slack)->first();
        
        $data = [
            'aspirasi' => $aspirasi
        ];

        return view('admin/v_show_aspirasi', compact('data'));
    }

    public function proses($slack)
    {
        $aspirasi = Aspirasi::with('user')->where('id', $slack)->first();
        
        $data = [
            'aspirasi' => $aspirasi
        ];

        return view('admin/v_proses_aspirasi', compact('data'));
    }

    public function accept($slack)
    {
        $update = Aspirasi::where('id', $slack)
                            ->update([
                                'disposisi' => 'diterima'
                            ]);

        if($update)
        {
            toastr()->success('Aspirasi diterima.');
            return Redirect('admin-aspirasi');
        }
        else
        {
            toastr()->error('Aspirasi gagal diterima.');
            return Redirect('admin-aspirasi');
        }
    }

    public function hasil(Request $request)
    {
        $random = Str::random(8);
        $file = $request->file('hasil');
        $filename = $random.'.'.$file->getClientOriginalExtension();
        $tujuan_upload = 'adm/document';
        $file->move($tujuan_upload, $filename);

        $update = Aspirasi::where('id', $request->aspirasi_id)
                            ->update([
                                'disposisi' => 'selesai',
                                'hasil' => $filename
                            ]);

        if($update)
        {
            toastr()->success('Hasil berhasil ditambahkan.');
            return Redirect('admin-aspirasi');
        }
        else
        {
            toastr()->error('Hasil gagal ditambahkan.');
            return Redirect('admin-aspirasi');
        }
    }

    public function store(Request $request)
    {
        if(!Auth::user()){
            toastr()->error('Silahkan login terlebih dahulu!!!');
            return redirect('login');
        }
        else{

            $data_aspirasi = DB::table('aspirasi')->where('disposisi', '!=', 'selesai')->where('user_id', Auth::user()->id)->first();

            if($data_aspirasi){
                toastr()->error('Anda sudah pernah memberi aspirasi, tunggu aspirasi anda selesai maka anda boleh memberi aspirasi kembali');
                return back();
            } else{

                $insert = DB::table('aspirasi')->insert([
                    'user_id'   => Auth::user()->id,
                    'disposisi' => 'terkirim',
                    'perihal'   => $request->perihal,
                    'pesan'     => $request->pesan
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
        }
    }
}
