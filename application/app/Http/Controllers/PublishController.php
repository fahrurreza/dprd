<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use DB;
use Str;
use Auth;
use Validator;
use App\ImageModel;
use Image;

class PublishController extends Controller
{
    public function showPublish($slug)
    {
        $post = Post::with(['image', 'user'])->where('slug', $slug)->first();
        
        return view('admin/v_showpublish', compact('post'));
    }

    public function showWarta($slug)
    {
        $data = [
            'post' => Post::with(['image', 'user'])->where('slug', $slug)->first(),
            'warta' => Post::with(['image', 'user'])->where('slug', '!=', $slug)->get()
        ];
        
        return view('dashboard/wartadetail', compact('data'));
    }

    public function createPublish(Request $request)
    {
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'image' => 'required|mimes:jpeg,png,jpg'
        ]);
 
         if ($validator->passes()) 
         {
            $random = Str::random(8);
            $file = $request->file('image');
            $filename = $random.'.'.$file->getClientOriginalExtension();
            
            $tujuan_upload = 'adm/images/upload';
	        $file->move($tujuan_upload, $filename);

           
            DB::beginTransaction();
            try
            {
                
                $post_id =  DB::table('posts')->insertGetId([
                            'title'             => $request->title,
                            'slug'              => Str::slug($request->title, '-'),
                            'content'           => $request->content,
                            'category'          => 'Warta',
                            'user_id'           => Auth::user()->id,
                            'created_at'        => now(),
                            'updated_at'        => NULL
                            ]);

                DB::table('image_post')->insert([
                        'post_id'            => $post_id,
                        'files'              => $filename,
                        ]);


                DB::commit();

                toastr()->Success('Posting berhasil upload');
                return back();
            }
            catch(Exception $e)
            {
                DB::rollback();

                toastr()->error('Oops, Terjadi kesalahan, hubungi pihak terkait');
                return back();
            }
         }
         else
         {
            toastr()->error('Format harus JPG, JPEG, PNG.');
            return back();
         }
    }

    public function deletePublish(Request $request)
    {
        $delete = Post::destroy($request->id);

        if($delete){
            toastr()->success('Role berhasil dihapus.');
            return back();
        }
        else{
            toastr()->error('Role gagal dihapus.');
            return back();
        }
    }

    public function admin_galeri()
    {
        if(Auth::user()->role_id == 1)
        {
            $post =  Post::with('image')->get();
        }
        else
        {
            $post =  Post::with('image')->where('user_id', Auth::user()->id)->get();
        }

        $data = [
            'post' => $post,
        ];

        return view('admin/v_galeri', compact('data'));
    }
}
