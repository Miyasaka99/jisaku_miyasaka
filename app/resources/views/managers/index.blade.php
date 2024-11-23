@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者画面</div>
                    <div class="table-resopnsive">
                        <div class="card-body"></div>
                        <div class="card-header">投稿ー一覧</div>
                        <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>商品画像</th>
                                <th>タイトル</th>
                                <th>投稿日時</th>
                                <th>ユーザーアイコン</th>
                                <th>ユーザー名</th>
                                <th>非表示</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($posts))
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->image }}</td>
                                <td>{{ $post->image }}</td>
                                <td>{{ $post->image }}</td>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->name }}</td>
                                <td><a href="{{ route('manager.postdel',  ['id' => $post->id]) }}">非表示</a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        </table>
                        <div class="card-body"></div>
                        <div class="card-header">ユーザー一覧</div>
                            <div class="table-resopnsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ユーザーアイコン</th>
                                        <th>ユーザー名</th>
                                        <th>利用停止</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @if(isset($users))
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->image }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="{{ route('manager.userdel',  ['id' => $user->id]) }}">利用停止</a></td>
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