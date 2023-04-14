<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;

class UserViewController extends Controller
{
    public function admin_warta()
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

        return view('admin/v_warta', compact('data'));
    }
}
