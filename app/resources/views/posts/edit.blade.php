<!-- 投稿編集画面 -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">投稿編集</div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- タイトル -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">タイトル</label>
                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">
                            </div>
                        </div>
                        <!-- 画像 -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">商品画像</label>
                            <div class="col-md-9">
                                <input type="file" name="image" class="form-control" value="{{ old('image', $post->image) }}">
                            </div>
                        </div>
                        <!--投稿日時  -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">投稿日時</label>
                            <div class="col-md-9">
                                <input id="date" type="date" class="form-control" name="date" value="{{ old('date', $post->date) }}">
                            </div>
                        </div>
                        <!-- 価格 -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">商品価格</label>
                            <div class="col-md-9">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price', $post->price) }}">
                            </div>
                        </div>
                        <!-- 商品紹介 -->
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">商品紹介文</label>
                            <div class="col-md-9">
                                <textarea name="introduction" id="introduction" style="resize: none; height: 200px; width: 100%">{{ old('introduction', $post->introduction) }}</textarea>
                            </div>
                        </div>
                        <!-- 商品の状態 -->
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">商品の状態</label>
                            <div class="col-md-9">
                                <textarea name="condition" id="condition" style="resize: none; height: 200px; width: 100%">{{ old('condition', $post->condition) }}</textarea>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                            <button type="submit" class="btn btn-primary ml-3" name='action' value='add'>
                                編集
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection