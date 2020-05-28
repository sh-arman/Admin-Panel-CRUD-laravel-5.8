<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'title', 'slug', 'image', 'category_id', 'content'
    ];

    public function category(){
      return $this->belongsTo('App\Category');
    }

    public function tags(){
      return $this->belongsToMany('App\Tag');
    }




}
