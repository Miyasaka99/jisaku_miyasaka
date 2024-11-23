<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; 
use App\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 条件式if:ユーザ権限が管理者の場合、リダイレクト
        $user = Auth::user(); 
        if ($user->role === '0') {
            // 管理者専用のリダイレクトまたは表示
            return redirect()->route('manager.index');
        }

        $posts = Post::with('user')->where('buy_flg','1')->get();

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // アップロードされたファイル名を取得
        $file_name = $request->file('image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/', $file_name);

        $post = Post::create([
            'title' => $request->title,
            'user_id' => $user_id,
            'date' => $request->date,
            'image' => 'storage/' . $file_name,
            'introduction' => $request->introduction,
            'price' => $request->price,
            'condition' => $request->condition,
            
        ]); // ここを追加
    
        return redirect()->route('posts.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        $post = Post::find($id);
        

    // 記事詳細画面を表示
    return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Int $id)
    {
        $post = Post::find($id); // ここを追記

        // 記事編集画面を表示
        return view('posts.edit', compact('post')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Int $id)
    {
        $post = Post::find($id);

        $file_name = $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('public/', $file_name); 
        
        $post->title = $request->title;
        $post->date = $request->date;
        $post->image = 'storage/'. $file_name;
        $post->introduction = $request->introduction;
        $post->price = $request->price;
        $post->condition = $request->condition;

        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /**
     * 検索機能
     * 
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $posts = new Post;

        $keyword = $request->input('keyword');

        // 未購入の投稿を表示

        if(!empty($keyword)) {//$keyword　が空ではない場合、検索処理を実行します
            $posts = $posts->where('buy_flg', '1')
               ->where(function ($query) use ($keyword) {
                   $query->where('title', 'LIKE', "%{$keyword}%")
                         ->orWhere('introduction', 'LIKE', "%{$keyword}%");
               });

        }else{
            $posts = $posts->where('buy_flg','1');
        }

        $posts = $posts->get();

        // 記事の一覧を表示
        return view('posts.index', compact('posts'));
    }
    

}
