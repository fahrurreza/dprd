<?php

namespace App\Http\Controllers;

use App\Models\{Rapat, Ruangan};
use Illuminate\Http\Request;
use DB;
use Str;
use Auth;
use Exception;

class RapatController extends Controller
{
    public function index()
    {
        $data = [
            'rapat'     => Rapat::orderBy('sifat_rapat', 'asc')->orderBy('waktu', 'asc')->get(),
            'ruangan'   => Ruangan::all()
        ];
        return view('admin/v_rapat', compact('data'));
    }

    public function hasil_rapat()
    {
        // if(Auth::user()->role_id == 3)
        // {
        //     return abort(404);
        // }

        $data = [
            'rapat' => Rapat::where('is_selesai', true)->get()
        ];
        return view('admin/v_hasilrapat', compact('data'));
    }

    public function arsip_rapat()
    {

        // if(Auth::user()->role_id == 3)
        // {
        //     return abort(404);
        // }

        $data = [
            'rapat' => Rapat::whereNotNull('hasil')->get()
        ];
        return view('admin/v_arsiprapat', compact('data'));
    }

    public function selesaikan_rapat(Request $request)
    {
        $cek = Rapat::where('is_selesai', false)->orderBy('sifat_rapat', 'asc')->orderBy('waktu', 'asc')->get()->first();

        if($cek->id != $request->id)
        {
            return false;
        }
        else
        {
            $is_selesai = ['is_selesai' => true];
            
            $update = Rapat::where('id', $request->id)
                            ->update($is_selesai);
            if($update)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

    public function createRapat(Request $request)
    {
        if($request->namarapat == 'Paripurna')
        {
            $sifat_rapat = 1;
        }
        else
        {
            $sifat_rapat = $request->sifat_rapat;
        }

        $waktu = date("Y-m-d H:i:s", strtotime($request->tgl_rapat." ".$request->waktu_rapat));

        $cek_waktu = Rapat::where('waktu', $waktu)->first();
    
        if(!$cek_waktu) 
        {
            $insert = DB::table('rapats')->insert([
                'nama_rapat'    => $request->nama_rapat,
                'acara_rapat'   => $request->acara_rapat,
                'peserta_rapat' => $request->peserta_rapat,
                'ruangan_id'    => $request->ruangan_id,
                'sifat_rapat'   => $sifat_rapat,
                'waktu'         => $waktu,
                'created_at'    => now(),
                'updated_at'    => NULL,
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
            if($cek_waktu->sifat_rapat == 1 & $sifat_rapat == 2)
            {
                toastr()->error('Rapat sudah ada pada jam yang sama.');
                return back();
            }
            elseif($cek_waktu->sifat_rapat == 2 & $sifat_rapat == 1)
            {
                $insert = DB::table('rapats')->insert([
                    'nama_rapat'    => $request->nama_rapat,
                    'acara_rapat'   => $request->acara_rapat,
                    'peserta_rapat' => $request->peserta_rapat,
                    'ruang_rapat'   => $request->ruang_rapat,
                    'sifat_rapat'   => $sifat_rapat,
                    'waktu'         => $waktu,
                    'created_at'    => now(),
                    'updated_at'    => NULL,
                ]);
        
                if($insert)
                {
                    $waktu = date("Y-m-d H:i:s", strtotime($request->tgl_rapat." ".$request->waktu_rapat));
                    $waktu_update =  date("Y-m-d H:i:s",(strtotime($cek_waktu->waktu))+3600);

                    $update = Rapat::where('id', $cek_waktu->id)
                        ->update([
                            'waktu'         => $waktu_update,
                            'updated_at'    => now()
                        ]);
                    toastr()->success('Data berhasil ditambahkan.');
                    return back();
                }
                else
                {
                    toastr()->error('Data gagal ditambahkan.');
                    return back();
                }
            }
            elseif($cek_waktu->sifat_rapat == 2 & $sifat_rapat == 2)
            {
                toastr()->error('Rapat sudah ada pada jam yang sama.');
                return back();
            }
            elseif($cek_waktu->sifat_rapat == 1 & $sifat_rapat == 1)
            {
                toastr()->error('Rapat sudah ada pada jam yang sama.');
                return back();
            }
        }
    
    }

    public function updateRapat(Request $request)
    {
        $cek_selesai = Rapat::where('id', $request->id)->first();

        if($cek_selesai->is_selesai == true){
            toastr()->error('Rapat gagal update karena telah selesai.');
            return back();
        }

        $waktu = date("Y-m-d H:i:s", strtotime($request->tgl_rapat." ".$request->waktu_rapat));
        
        $update = Rapat::where('id', $request->id)
                    ->update([
                        'nama_rapat'    => $request->nama_rapat,
                        'acara_rapat'   => $request->acara_rapat,
                        'peserta_rapat' => $request->peserta_rapat,
                        'ruangan_id'    => $request->ruangan_id,
                        'sifat_rapat'   => $request->sifat_rapat,
                        'waktu'         => $waktu,
                        'updated_at'    => now()
                    ]);

        if($update)
        {
            toastr()->success('Rapat berhasil update.');
            return back();
        }
        else
        {
            toastr()->error('Rapat gagal update.');
            return back();
        }
    }

    public function createHasilRapat(Request $request)
    {
        $random = Str::random(8);
        $file = $request->file('hasil');
        $filename = $random.'.'.$file->getClientOriginalExtension();

        $update = Rapat::where('id', $request->rapat_id)
                            ->update([
                                'keterangan' => $request->keterangan_rapat,
                                'hasil' => $filename
                            ]);

        if($update)
        {
            
            $tujuan_upload = 'adm/document';
            $file->move($tujuan_upload, $filename);
            toastr()->success('Hasil berhasil ditambahkan.');
            return back();
        }
        else
        {
            toastr()->error('Hasil gagal ditambahkan.');
            return back();
        }
    }

    public function editRapat(Request $request)
    {
        if($request->ajax())
        {
            $rapat = Rapat::where('id', $request->id)->first();
            return Response($rapat);
        }
    }

    public function deleteRapat(Request $request)
    {
        $delete = Rapat::destroy($request->rapat_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

    public function deleteHasilRapat(Request $request)
    {
        $update = Rapat::where('id', $request->rapat_id)
                            ->update([
                                'is_selesai' => false,
                                'keterangan' => null,
                                'hasil' => null
                            ]);

        if($update)
        {
            toastr()->success('Hasil berhasil dihapus.');
            return back();
        }
        else
        {
            toastr()->error('Hasil gagal ditambahkan.');
            return back();
        }
    }
}
