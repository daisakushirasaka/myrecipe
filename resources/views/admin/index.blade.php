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
                <table class="table table-light table-hover table-bordered text-nowrap">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">レシピ名</th>
                            <th class="text-center">レシピ説明</th>
                            <th class="text-center">編集・削除</th>
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
                                        <a href="{{ action('RecipeController@edit', ['id' => $recipe->id]) }}">編集</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="{{ action('RecipeController@delete', ['id' => $recipe->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection