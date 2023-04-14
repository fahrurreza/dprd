<?php

namespace App\Http\Controllers;

use App\Models\{Jabatan, Partai, Komisi, Anggota, Pendidikan, Ruangan};
use Illuminate\Http\Request;
use DB;

class MasterDataController extends Controller
{
    //JABATAN
    public function jabatan()
    {
        $data = [
            'jabatan' => Jabatan::all()
        ];
        return view('admin/v_jabatan', compact('data'));
    }

    public function createJabatan(Request $request)
    {
        if($request->jabatan === null)
        {
            toastr()->error('Gagal menambahkan jabatan. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('jabatans')->insert([
            'jabatan' => $request->jabatan
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

    public function updateJabatan(Request $request)
    {
        $update = Jabatan::where('id', $request->id)
                    ->update([
                        'jabatan'       => $request->jabatan
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

    public function deleteJabatan(Request $request)
    {
        $delete = Jabatan::destroy($request->jabatan_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }
    //END JABATAN

    //KOMISI
    public function komisi()
    {
        $data = [
            'komisi' => Komisi::all()
        ];
        return view('admin/v_komisi', compact('data'));
    }

    public function createKomisi(Request $request)
    {
        if($request->komisi === null)
        {
            toastr()->error('Gagal menambahkan komisi. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('komisi')->insert([
            'komisi'    => $request->komisi
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

    public function updateKomisi(Request $request)
    {
        $update = Komisi::where('id', $request->id)
                    ->update([
                        'komisi'       => $request->komisi
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

    public function deleteKomisi(Request $request)
    {
        $delete = Komisi::destroy($request->komisi_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }

    public function deletePendidikan(Request $request)
    {
        $delete = Pendidikan::destroy($request->pendidikan_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }
    //END KOMISI

    //PARTAI
    public function partai()
    {
        $data = [
            'partai' => Partai::all()
        ];
        return view('admin/v_partai', compact('data'));
    }

    public function createPartai(Request $request)
    {
        if($request->partai === null)
        {
            toastr()->error('Gagal menambahkan partai. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('partai')->insert([
            'partai'    => $request->partai,
            'logo'      => ''
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

    public function updatePartai(Request $request)
    {
        $update = Partai::where('id', $request->id)
                    ->update([
                        'partai'       => $request->partai
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

    
    public function deletePartai(Request $request)
    {
        $delete = Partai::destroy($request->partai_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }
    //END PARTAI

    //PENDIDIKAN
    public function pendidikan()
    {
        $data = [
            'pendidikan' => Pendidikan::all()
        ];
        return view('admin/v_pendidikan', compact('data'));
    }

    public function createPendidikan(Request $request)
    {
        if($request->pendidikan === null)
        {
            toastr()->error('Gagal menambahkan pendidikan. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('pendidikans')->insert([
            'pendidikan'    => $request->pendidikan
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

    public function updatePendidikan(Request $request)
    {
        $update = Pendidikan::where('id', $request->id)
                    ->update([
                        'pendidikan'       => $request->pendidikan
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
    //END PENDIDIKAN

    //ANGGOTA
    public function anggota()
    {
        $data = [
            'anggota'       => Anggota::with('jabatan')->get(),
            'jabatan'       => Jabatan::all(),
            'partai'        => Partai::all(),
            'komisi'        => Komisi::all(),
            'pendidikan'    => Pendidikan::all(),
        ];
        return view('admin/v_anggota', compact('data'));
    }

    public function createAnggota(Request $request)
    {
        $insert = DB::table('anggota')->insert([
            'jabatan_id'        => $request->jabatan_id,
            'partai_id'         => $request->partai_id,
            'komisi_id'         => $request->komisi_id,
            'nama'              => $request->nama,
            'nip'               => $request->nip,
            'pendidikan_id'     => $request->pendidikan_id,
            'tempat_lahir'      => $request->tempat_lahir,
            'tgl_lahir'         => $request->tgl_lahir,
            'alamat'            => $request->alamat,
            'awal'              => $request->awal,
            'akhir'             => $request->akhir,
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

    
    public function deleteAnggota(Request $request)
    {
        $delete = Anggota::destroy($request->anggota_id);

        if($delete){
            toastr()->success('Data berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Data gagal dihapus.');
            return back();
        }
    }
    //END ANGGOTA

    //RUANGAN
    public function ruang_rapat(Request $request)
    {
        $data = [
            'ruangan' => Ruangan::all()
        ];

        return view('admin/v_ruangan', compact('data'));
    }

    public function createRuangan(Request $request)
    {
        if($request->ruangan === null)
        {
            toastr()->error('Gagal menambahkan ruangan. Tidak ada data yang dikirim !!');
            return back();
        }

        $insert = DB::table('ruangan')->insert([
            'nama'    => $request->ruangan
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

    public function updateRuangan(Request $request)
    {
        $update = Ruangan::where('id', $request->id)
                    ->update([
                        'nama'       => $request->ruangan
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

    public function deleteRuangan(Request $request)
    {
        $delete = Ruangan::destroy($request->ruangan_id);

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
