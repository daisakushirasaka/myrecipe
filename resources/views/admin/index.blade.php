@extends('layouts.admin')
@section('title', 'レシピ一覧')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('RecipeController@index') }}" method="get">
                <div class="form-group row">
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="レシピ名で検索">
                    </div>
                    <div class="col-md-4">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="検索">
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="list-recipe col-md-12 mx-auto">
            <div class="table-responsive">
                <table class="table table-light table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">レシピ名</th>
                            <th class="text-center">レシピ説明</th>
                            <th class="text-center">操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $recipe)
                            <tr>
                                <th class="text-center">{{ $recipe->id }}</th>
                                <td>{{ \Str::limit($recipe->title, 20) }}</td>
                                <td>{{ \Str::limit($recipe->body, 20) }}</td>
                                <td>

                                    <div class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ action('RecipeController@edit', ['id' => $recipe->id]) }}" role="button">編集</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal"　href="{{ action('RecipeController@delete', ['id' => $recipe->id]) }}">削除</a>
                                    </div>
                                
                                    <!-- ボタン・リンククリック後に表示される画面の内容 -->
                                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>削除確認画面</h4></h4>
                                                </div>
                                                <div class="modal-body">
                                                    <label>データを削除しますか？</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                                    <button type="button" class="btn btn-danger" data-toggle="modal">削除</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="pagination">{{ $posts->links() }}</div>
</div>
@endsection