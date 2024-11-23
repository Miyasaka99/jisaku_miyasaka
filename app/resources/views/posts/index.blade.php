<!-- 投稿一覧 -->
@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">投稿一覧</div>
        <div class="card-body">
          <button type="button" class="btn btn-primary ml-3" onclick="location.href='{{ route('posts.create') }}'">
            新規投稿
          </button> 
          <div>
            <form action="{{ route('posts.search') }}" method="GET">

            @csrf

              <input type="text" name="keyword">
              <input type="submit" class="btn btn-primary ml-3"   value="検索">
            </form>
          </div>
          <div class="table-resopnsive">
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>商品画像</th>
                    <th>タイトル</th>
                    <th>投稿日時</th>
                    <th>ユーザーアイコン</th>
                    <th>ユーザー名</th>
                </tr>
              </thead>
              <tbody>
                @if(isset($posts))
                  @foreach ($posts as $post)
                  <tr>
                      <td><img src="{{ asset( $post->image ) }}" width="100" height="100"></td>
                      <td>><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->date }}</td>
                      <td><img src="{{ asset( $post->user->image ) }}" width="100" height="100"></td>
                      <td><a href="{{ route('user.index', ['id' => $post->user->id] ) }}">{{ $post->user->name }}</a></td>
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
@endsection