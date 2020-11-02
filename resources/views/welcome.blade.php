@extends('layouts.admin')
@section('title', 'HAHAごはん')

@section('content')
<div class="image-box">
    <img src="image/top.jpg" alt="メイン画像" width="100%" height="100%">

    <div class="recipe-create">
        <a href="/admin/create"><i class="fas fa-utensils"></i> レシピ作成</a>
    </div>

    <div class="recipe-index">
       <a href="/admin/index"><i class="fas fa-list-ul"></i> レシピ一覧</a>
    </div>

    <!-- LINEのソーシャルプラグイン設置 -->
    <div class="line-icon">
        <div class="line-it-button" data-lang="ja" data-type="share-a" data-ver="3" data-url="https://agile-harbor-21723.herokuapp.com" data-color="default" data-size="large" data-count="false" style="display: none;"></div>
        <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
    </div>
</div>
@endsection