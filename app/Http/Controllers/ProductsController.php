<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ProductsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $products = Post::all();
    return view('products.index', compact('products'));
  }
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
//   public function store(Request $request)
//   {
//     $request->validate([
//       'title' => 'required|max:255',
//       'body' => 'required',
//     ]);
//     Post::create($request->all());
//     return redirect()->route('products.index')
//       ->with('success', 'Post created successfully.');
//   }

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'body' => 'required',
    ]);
    
    $data = $request->all();
    $data['userId'] = auth()->id();  // Set the userId
    
    Post::create($data);
    
    return redirect()->route('products.index')
        ->with('success', 'Post created successfully.');
}

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $request->validate([
      'title' => 'required|max:255',
      'body' => 'required',
    ]);
    $post = Post::find($id);
    $post->update($request->all());
    return redirect()->route('products.index')
      ->with('success', 'Post updated successfully.');
  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('products.index')
      ->with('success', 'Post deleted successfully');
  }
  // routes functions
  /**
   * Show the form for creating a new post.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('products.create');
  }
  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return view('products.show', compact('post'));
  }
  /**
   * Show the form for editing the specified post.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);
    return view('products.edit', compact('post'));
  }
}

// public function __construct()
// {
//     $this->middleware('auth');
// }
