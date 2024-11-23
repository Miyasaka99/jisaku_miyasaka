<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\User;

class UserController extends Controller
{
    public function index(int $id)
    {
        $user = User::with('post')->find($id); 


        
        // 記事の一覧を表示
        return view('user.index', compact('user'));
    } 
}
