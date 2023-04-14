<?php

namespace App\Http\Controllers;

use App\Models\{Organisasi, Tugaspokok, Tugasfungsi, Anggota, Struktur};
use Illuminate\Http\Request;
use DB;

class OrganisasiController extends Controller
{
    public function  index()
    {
        $data = [
            'organisasi'    => Organisasi::all()
        ];
        return view('admin/v_organisasi', compact('data'));
    }

    public function  tugas_pokok()
    {
        $data = [
            'organisasi'    => Organisasi::all(),
            'tugaspokok'    => Tugaspokok::all()
        ];
        return view('admin/v_tugaspokok', compact('data'));
    }

    public function  tugas_fungsi()
    {
        $data = [
            'organisasi'        => Organisasi::all(),
        ];
        return view('admin/v_tugasfungsi', compact('data'));
    }

    public function struktur_organisasi()
    {
        $data = [
            'anggota'       => Anggota::all(),
            'struktur'      => Struktur::with('anggota')->get(),
        ];
        return view('admin/v_struktur', compact('data'));
    }

    public function createOrganisasi(Request $request)
    {
        if($request->organisasi === null)
        {
            toastr()->error('Gagal menambahkan organisasi. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('organisasi')->insert([
            'unit'    => $request->organisasi
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

    public function createTugasPokok(Request $request)
    {
        if($request->fungsi === null)
        {
            toastr()->error('Gagal menambahkan Tugas Pokok. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('tugas_pokok')->insert([
            'organisasi_id'     => $request->organisasi_id,
            'tugas'             => $request->fungsi
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

    public function createTugasFungsi(Request $request)
    {
        if($request->fungsi === null)
        {
            toastr()->error('Gagal menambahkan Tugas fungsi. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('tugas_fungsi')->insert([
            'organisasi_id'     => $request->organisasi_id,
            'fungsi'             => $request->fungsi
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

    public function createStruktur(Request $request)
    {
        if($request->anggota_id === null || $request->jabatan === null)
        {
            toastr()->error('Gagal menambahkan data. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('struktur_organisasi')->insert([
            'anggota_id'     => $request->anggota_id,
            'jabatan'        => $request->jabatan
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

    public function updateOrganisasi(Request $request)
    {
        $update = Organisasi::where('id', $request->id)
                    ->update([
                        'unit'       => $request->organisasi
                    ]);

        if($update)
        {
            toastr()->success('Data berhasil update.');
            return back();
        }
        else
        {
            toastr()->error('Data gagal update.');
            return back();
        }
    }

    public function deleteOrganisasi(Request $request)
    {
        $delete = Organisasi::destroy($request->organisasi_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

    public function deleteTugasPokok(Request $request)
    {
        $delete = Tugaspokok::destroy($request->tugaspokok_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

    public function deleteTugasFungsi(Request $request)
    {
        $delete = Tugasfungsi::destroy($request->tugasfungsi_id);

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
