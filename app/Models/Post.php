<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Post extends Model
{
    use HasFactory;

    // public static function all()
    // {
    // return cache()->rememberForever('posts.all', function() {
    //     return collect(File::files(resource_path('posts')))
    //     ->map(fn($file) => Yam)
    // });
    // }

    public static function find($id)
    {
        $post = static::all()->firstWhere('id', $id);
        if (!$post) {
            throw new ModelNotFoundException();
        }
    }
}
