<?php

namespace App\Http\Controllers;

use App\Models\{Post, Visimisi, Organisasi, Struktur, Partai};
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $aspirasi = DB::table('aspirasi')->where('user_id', Auth::user()->id)->get();
        }
        else
        {
            $aspirasi = DB::table('aspirasi')->where('user_id', 0)->get();
        }
        
        $data = [
            'warta' => Post::orderBy('created_at', 'desc')->limit(3)->get(),
            'visi' => Visimisi::where('jenis', 'visi')->get(),
            'misi' => Visimisi::where('jenis', 'misi')->get(),
            'organisasi' => Organisasi::with(['tugasfungsi', 'tugaspokok'])->get(),
            'struktur'      => Struktur::with('anggota')->get(),
            'fraksi'      => Partai::all(),
            'fraksi'      => Partai::all(),
            'aspirasi' => $aspirasi
        ];

        return view('dashboard.index', compact('data'));
    }
}
