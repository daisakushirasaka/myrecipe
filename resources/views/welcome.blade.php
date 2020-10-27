@extends('layouts.admin')
@section('title', 'HAHAごはん')

@section('content')
<div class="image-box">
    <img src="image/AdobeStock_284808749.jpg" alt="メイン画像" width="100%" height="100%">

    <div class="recipe-create">
        <a href="/myrecipe/public/admin/create"><i class="fas fa-utensils"></i> レシピ作成</a>
    </div>

    <div class="recipe-index">
       <a href="/myrecipe/public/admin/create"><i class="fas fa-list-ol"></i> レシピ一覧</a2>
    </div>
</div>
@endsection