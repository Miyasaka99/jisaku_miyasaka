<!-- 投稿詳細画面 -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">記事詳細</div>
                <div class="card-body">
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>タイトル</th>
                                    <th>商品画像</th>
                                    <th>投稿日時</th>
                                    <th>紹介文</th>
                                    <th>価格</th>
                                    <th>商品の状態</th>
                                    <button type="button" class="btn btn-primary ml-3" onClick="location.href='{{ route('posts.edit', $post->id) }}'">
                                     編集
                                    </button>
                                    <button type="button" class="btn btn-primary ml-3" onClick="location.href='{{ route('buy.store', ['id' => $post->id]) }}'">
                                     購入する
                                    </button>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($post))
                                <tr>
                                        <td>{{ $post->title }}</td>
                                        <td><img src="{{ asset($post->image) }}"width="100" height="100"></td>
                                        <td>{{ $post->date }}</td>
                                        <td>{{ $post->introduction }}</td>
                                        <td>{{ $post->price }}</td>
                                        <td>{{ $post->condition }}</td>
                                </tr>
                                @endif

                                    
                            </tbody>
                        </table>
                        @if(isset($post))
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary" onClick="history.back()">戻る</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection