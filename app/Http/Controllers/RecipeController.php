<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;

class RecipeController extends Controller
{
    //
    public function add() {
    return view('admin.create');
    }

    public function create(Request $request) {
        // Varidationを行う
        $this->validate($request, Recipe::$rules);
    
        // RecipeモデルにあるRecipeclassをコンストラクタ化して使用する（classのままでは実行できない）
        $recipe = new Recipe;

        // formで入力された値を全て取得することができる
        $form = $request->all();

        // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $recipe->image_path = basename($path);
        } else {
            $recipe->image_path = null;
        }

        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['image']);

        // title,body,image-pathの配列をカラムに代入するには、fillメソッドを使う
        $recipe->fill($form);

        // 保存するにはsaveメソッドを使用する
        $recipe->save();

        return redirect('admin/create');
    }
}
