<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\HTML;


use App\Recipe;

class UserRecipeController extends Controller
{
    public function index(Request $request) {
        $posts = Recipe::latest()->paginate(5);
        
        if (count($posts) > 0) {
            $headline = $posts->shift();
        } else {
            $headline = null;
        }

        // View テンプレートに headline、 posts、という変数を渡している
        return view('user.index', ['headline' => $headline, 'posts' => $posts]);
    }
}