<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'userId',
        'title',
        'body',
      ];
}
    // Post::create(request([
    //     'body' => request('body'),
    //     'title' => request('title'),
    //     'user_id' => auth()->id()
    // ]));