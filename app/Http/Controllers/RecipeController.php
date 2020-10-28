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

        // フォームから画像が送信されてきたら、保存して、$recipe->image_path に画像のパスを保存する
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

    public function index(Request $request) {
        $cond_title = $request->cond_title;
        if ($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Recipe::where('title','like','%'.$cond_title.'%')->get();
        } else {
            // それ以外はすべてのニュースを取得する
            $posts = Recipe::all();
        }
        return view('admin.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }


    public function edit(Request $request) {
        // Modelからデータを取得する
        $recipe = Recipe::find($request->id);
        if (empty($recipe)) {
        abort(404);    
        }
        return view('admin.edit', ['recipe_form' => $recipe]);
    }


    public function update(Request $request) {
        // Validationをかける
        $this->validate($request, Recipe::$rules);
        // Modelからデータを取得する
        $recipe = Recipe::find($request->id);
        // 送信されてきたフォームデータを格納する
        $recipe_form = $request->all();
        if ($request->remove == 'true') {
            $recipe_form['image_path'] = null;
        } elseif ($request->file('image')) {
            $path = $request->file('image')->store('public/image');
            $recipe_form['image_path'] = basename($path);
        } else {
            $recipe_form['image_path'] = $recipe->image_path;
        }

        unset($recipe_form['image']);
        unset($recipe_form['remove']);
        unset($recipe_form['_token']);
        // 該当するデータを上書きして保存する
        $recipe->fill($recipe_form)->save();

        return redirect('admin/index');
    }

    public function about() {
    return view('user.about');
    }

    
    public function delete(Request $request) {
        // 該当するModelを取得
        $recipe = Recipe::find($request->id);
        // 削除する
        $recipe->delete();
        return redirect('admin/index');
    }  


}
