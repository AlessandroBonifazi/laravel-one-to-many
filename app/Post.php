<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public static function createSlug($title) {
        $slug = Str::slug($title);
        $counterSlug = $slug;
        $postFound = Post::where('slug', $slug)->first();
        $counter = 1;
        while($postFound){
            $counterSlug = $slug . '_' . $counter;
            $counter++;
            $postFound = Post::where('slug', $counterSlug)->first();
        }
        return $counterSlug;
    }
}
