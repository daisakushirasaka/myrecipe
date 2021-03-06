<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = array('id');

    //レシピ名と説明文は必須入力にする
    public static $rules = array(
        'title' => 'required',
        'body' => 'required',
    );
}
