<!-- 他ユーザーページ -->
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザーページ</div>
                    <div class="table-resopnsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>名前:{{ $user->name }}</th>
                                    <th>ユーザーアイコン：<img src="{{ asset($user->image) }}" width="100" height="100"></th>
                                    <th>自己紹介：{{ $user->profile }}</th>
                                </tr>
                            </thead>
                        </table>
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
                                    @if(isset($user->post))
                                        @foreach ($user->post as $pos)
                                        <tr>
                                            <td><img src="{{ asset($pos->image) }}"width="100" height="100"></td>
                                            <td>><a href="{{ route('posts.show', $pos->id) }}">{{ $pos->title }}</a></td>
                                            <td>{{ $pos->price }}</td>
                                            <td>{{ $pos->date }}</td>
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