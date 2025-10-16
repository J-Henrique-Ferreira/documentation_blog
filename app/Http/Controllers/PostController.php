<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('pages.post.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pages.post.create-update',
            [
                'method' => 'POST',
                'action' => route('admin.posts.store')
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $post = null;

        return view(
            'pages.post.create-update',
            [
                'method' => 'POST',
                'action' => route('admin.posts.store'),
                'post' => $post
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post = null;

        dd($post);

        return redirect(route('admin.categorias.index'))->with('success', 'Categoria criada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
