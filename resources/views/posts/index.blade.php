<!DOCTYPE html>
 
<html>
 
 
<head>
 
<meta charset='utf-8"'>
 
<link rel='stylesheet' href="{{ asset('/css/app.css') }}">
 
<meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>
 
 
<body>
 
<header>
 
<h1>Laravelを使った投稿機能の実装</h1>
 
</header>


 
 
<div class='container'>

<p class="pull-right"><a class="btn btn-success" href="/create-form">投稿する</a></p>
 
<h2 class='page-header'>投稿一覧</h2>
 
<table class='table table-hover'>
 
<tr>
 
<th>投稿No</th>
 
<th>投稿内容</th>
 
<th>投稿日時</th>
 
</tr>

<th></th>
 
</tr>
 
@foreach ($lists as $list)
 
<tr>
 
<td>{{ $list->id }}</td>
 
<td>{{ $list->post }}</td>
 
<td>{{ $list->created_at }}</td>
 
</tr>

<td><a class="btn btn-primary" href="/post/{{ $list->id }}/update-form">更新</a></td>

<td><a class="btn btn-danger" href="/post/{{ $list->id }}/delete"
 onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')">削除</a></td>
 
@endforeach
 
</table>
 
</div>
 
<footer>
 
<small>Laravel@crud.curriculum</small>
 
</footer>
 
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
</body>
 
 
</html>
