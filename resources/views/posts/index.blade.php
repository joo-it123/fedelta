@extends('layouts.app')

@section('content')
<body>
<div class='container'>

<p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>


<form action="{{ route('posts.in') }}" method="GET">
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">
  </form>
  @if(count($lists) === 0)
    <p>検索結果は0件です。</p>
@else
@endif

 
<h2 class='page-header'>投稿一覧</h2>
 
<table class='table table-hover'>
 
<tr>
 
<th>投稿No</th>

<th>投稿者</th> 
 
<th>投稿内容</th>
 
<th>投稿日時</th>
 
</tr>

<th></th>
 
</tr>
 
@foreach ($lists as $list)
 
<tr>
 
<td>{{ $list->id }}</td>

<!-- <td>{{ $list->name }}</td> -->
<td>
        @if ($list->user)
                {{ $list->user->name }}
            @else
                投稿者不明
            @endif
</td> 
 
<td>{{ $list->post }}</td>
 
<td>{{ $list->created_at }}</td>
 
</tr>
<td>
<!-- ユーザーがログインしており、かつそのユーザーが投稿の作者である場合 -->
    @if (Auth::check() && $list->user_id === Auth::user()->id)
    <a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a>

        <a class="btn btn-danger" href="/post/{{ $list->id }}/delete"
    onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a>
    @endif

</td>
 
@endforeach
 
</table>
 
</div>


  </div>
 
<footer>
 
<small>Laravel@crud.curriculum</small>
 
</footer>
 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
</body>
 
 
</html>
