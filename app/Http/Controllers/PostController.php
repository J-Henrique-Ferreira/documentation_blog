<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Traits\ReturnErrors;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Traits\ParseMdToHtml;

class PostController extends Controller
{
    use ReturnErrors;
    use ParseMdToHtml;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $tenantId = auth()->user()->tenant_id;
            $categoriesList = Category::where('tenant_id', $tenantId)->get();
            $postsList = Post::where('tenant_id', $tenantId)->with('category', 'author')->orderBy('updated_at', 'desc')->paginate(12);

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
    public function show(Request $request)
    {
        $tenantId = auth()->user()->tenant_id;
        $categoriesList = Category::where('tenant_id', $tenantId)->get();
        $post = Post::where('slug', $request->slug)->where('tenant_id', $tenantId)->get();

        if (count($post->all()) <= 0)
            abort(404);

        $post = $post->all()[0];

        if ($post->tenant_id != auth()->user()->tenant_id) {
            abort(404);
        }

        $post->content = $this->parseMdToHtml($post->content);
        $routesLinksList = null;

        foreach ($categoriesList as $category) {
            $data = [
                'name' => $category->name,
                'href' => route('documentos.showallByCategory', $category->id),
                'icon' => $category->icon,
                'id' => $category->id
            ];

            $routesLinksList[] = $data;
        }

        return view(
            'pages.post.show-unique',
            compact(
                'post',
                'routesLinksList',
                'categoriesList'
            )
        );

    }

    public function showAll(Request $request)
    {
        $tenantId = auth()->user()->tenant_id;
        $categoriesList = Category::where('tenant_id', $tenantId)->get();
        $postsList = [];
        $routesLinksList = null;

        foreach ($categoriesList as $category) {
            $data = [
                'name' => $category->name,
                'href' => route('documentos.showallByCategory', $category->id),
                'icon' => $category->icon,
                'id' => $category->id
            ];

            $routesLinksList[] = $data;
        }


        if ($request->category_id) {
            $postsList = Post::where(
                'tenant_id',
                $tenantId
            )->where('category_id', $request->category_id)->where('status', 'publish')->with('category', 'author')->paginate(12);
        }

        return view(
            'pages.post.show-all',
            compact(
                'categoriesList',
                'postsList',
                'routesLinksList'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $tenantId = auth()->user()->tenant_id;
        $post = Post::findOrFail($request->documento);
        $categoriesList = Category::where('tenant_id', $tenantId)->get();

        // dd($post);

        return view(
            'pages.post.create-update',
            [
                'method' => 'PUT',
                'action' => route('admin.documentos.update', $post->id),
                'post' => $post,
                'categoriesList' => $categoriesList

            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $documento)
    {
        $post = Post::findOrFail($documento);

        try {
            $post->update($request->all());
            $post->save();

            return redirect(route('admin.documentos.index'))->with('success', 'Documento alterado com sucesso!');

        } catch (\Throwable $th) {
            return $this->returnErrors($th, [
                'message' => 'Erro ao editar documento.',
                'route' => route('admin.documentos.edit', $documento)
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        try {
            $post = Post::find($request->documento);
            $post->delete();
            return redirect(route('admin.documentos.index'))->with('success', 'Documento removido com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, [
                'message' => 'Erro ao remover documento.',
                'route' => route('admin.documentos.index', )
            ]);
        }
    }
}
