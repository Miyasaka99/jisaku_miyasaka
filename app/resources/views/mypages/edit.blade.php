<!-- マイぺージ編集画面 -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">マイページ編集</div>
                <div class="card-body">
                    <form action="{{ route('mypages.update', $mypage->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <!-- タイトル -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">ユーザー名</label>
                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $mypage->name) }}">
                            </div>
                        </div>
                        <!-- 画像 -->
                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">アイコン画像</label>
                            <div class="col-md-9">
                                <input id="image" type="text" class="form-control" name="image" value="{{ old('image', $mypage->image) }}">
                            </div>
                        </div>
                        <!-- 自己紹介 -->
                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">自己紹介文</label>
                            <div class="col-md-9">
                                <textarea name="profile" id="profile" style="resize: none; height: 200px; width: 100%">{{ old('profile', $mypage->profile) }}</textarea>
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