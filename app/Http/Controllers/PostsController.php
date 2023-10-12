<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return [
            [
                'id' => 1,
                'title' => 'Programing',
                'description' => 'This post about programming',
                'body' => 'In 2023 we have a lot of good programming languages, the mos popular are: JavaScript, Php, Golang, Python', 'Java', 'C#', 'C++'
            ],
            [
                'id' => 2,
                'title' => 'University in Almaty',
                'description' => 'This post about universities that located In Almaty',
                'body' => 'If you want to join to universities, firstful you have to think about Almaty'
            ],
            [
                'id' => 3,
                'title' => 'Computers',
                'description' => 'This post about computers',
                'body' => 'Nowadays in companies use DeLL, Lenovo and etc. computers'
            ],
        ];
    }

    public function getAll()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::find($id);
    }

    public function create()
    {
        $postTags = ["history", "american", "crime"];
        $post = new Post();
        $post->title = 'Programing';
        $post->body = 'This post about programming';
        $post->userId = 1;
        $post->reactions = 1000;
        $post->tags = json_encode($postTags);
        if ($post->save()) {
            return 'good';
        } else {
            return 'bad';
        }
    }

    public function update(Post $post)
    {
        $post->title = "hello";
        $post->save();
    }
}
