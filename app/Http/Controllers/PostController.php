<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Traits\ReturnErrors;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{
    use ReturnErrors;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tenantId = auth()->user()->tenant_id;

            $categoriesList = Category::where('tenant_id', $tenantId)->get();
            $postsList = Post::where('tenant_id', $tenantId)->with('category', 'author')->paginate(10);

            return view(
                'pages.post.index',
                compact(
                    'categoriesList',
                    'postsList'
                )
            );
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $tenantId = auth()->user()->tenant_id;
            $categoriesList = Category::where('tenant_id', $tenantId)->get();

            return view(
                'pages.post.create-update',
                [
                    'method' => 'POST',
                    'action' => route('admin.documentos.store'),
                    'categoriesList' => $categoriesList
                ]
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request->all());
        try {
            $post = new Post();
            $post->fill($request->all());
            $post->tenant_id = auth()->user()->tenant_id;
            $post->author_id = auth()->user()->id;
            $post->save();

            return redirect(route('admin.documentos.index'))->with('success', 'Documento criado com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, [
                'message' => 'Erro ao criar documento.',
                'route' => route('admin.documentos.index')
            ]);
        }
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
                'action' => route('admin.documentos.store'),
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
