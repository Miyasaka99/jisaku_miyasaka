<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class ManagerController extends Controller
{
    public function index(Request $request)
    {
        // 投稿一覧表示
        $posts = Post::where('buy_flg','1')->get();

        // ユーザー一覧表示
        $users = User::all();
        
        // 記事の一覧を表示
        return view('managers.index', compact('posts','users'));
    }
    public function userdel($id)
    {
        User::find($id)->delete(); // softDelete
 
        return redirect('/manager');
    }
    public function postdel($id)
    {
        Post::find($id)->delete(); // softDelete
 
        return redirect('/manager');
    }
    
   
}
