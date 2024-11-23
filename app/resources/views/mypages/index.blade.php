@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">マイページ</div>
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>名前:{{ $user->name }}</th>
                                    <th>ユーザーアイコン：<img src="{{ asset($user->image) }}" width="100" height="100"></th>
                                    <th>自己紹介：{{ $user->profile }}</th>
                                    <!-- <th>フォロー一覧：{{ $user->profile }}</th> -->
                                </tr>
                            </thead>
                        </table>
                        <button type="button" class="btn btn-primary ml-3" onclick="location.href='{{ route('posts.index') }}'">
                            投稿一覧に戻る
                        </button>
                        <button type="button" class="btn btn-primary ml-3" onclick="location.href='{{ route('posts.create') }}'">
                            新規投稿
                        </button>
                        <button type="button" class="btn btn-primary ml-3" onclick="location.href='{{ route('mypages.edit', $user->id) }}'">アカウント編集</button>
                        <form style="display:inline" action="{{ route('mypages.destroy', $user->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger ml-3">
                                {{ __('削除') }}
                            </button>
                        </form>
                        <div class="card-body"></div>
                        <div class="card-header">投稿一覧</div>
                            <div class="table-resopnsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>商品画像</th>
                                        <th>タイトル</th>
                                        <th>価格</th>
                                        <th>投稿日時</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($posts))
                                    @foreach ($posts as $post)
                                    <tr>
                                        <td><img src="{{ asset($post->image) }}"width="100" height="100"></td>
                                        <td>><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                        <td>{{ $post->price }}</td>
                                        <td>{{ $post->date }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- 購入一覧 -->
                        <div class="card-body"></div>
                        <div class="card-header">購入一覧</div>
                            <div class="table-resopnsive">
                                <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>商品画像</th>
                                        <th>タイトル</th>
                                        <th>価格</th>
                                        <th>購入日時</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($buies))
                                    @foreach ($buies as $buy)
                                    <tr>
                                        <td><img src="{{ asset($buy->post->image) }}"></td>
                                        <td><a href="{{ route('posts.show', $buy->id) }}">{{ $buy->post->title }}</a></td>
                                        <td>{{ $buy->post->price }}</td>
                                        <td>{{ $buy->created_at->format('Y-m-d') }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection