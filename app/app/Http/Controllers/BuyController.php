<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buy; 
use App\Post; 
use Illuminate\Support\Facades\Auth;

class BuyController extends Controller
{
    public function buystore($id){
        
        $buy = new Buy;
        //$idを$buyのpost_idにする
        $buy -> post_id = $id;

        // ログイン中のユーザーのbuyテーブルのpost_idに保存
       Auth::user()->buy()-> save($buy);

       $post = new post;
        //下の$idは上の$buyとつながっている ($post=$buy)   
       $post = $post ->find($id);
        
       // buy_flgを変える
       $post -> buy_flg = 0;

       $post ->save();

        return redirect('/');
    }
}
