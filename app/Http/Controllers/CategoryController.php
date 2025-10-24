<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\ReturnErrors;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    use ReturnErrors;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tenantId = auth()->user()->tenant_id;
        $categoriesList = Category::where('tenant_id', $tenantId)->get();
        return view('pages.categoria.index', compact('categoriesList'));
    }

    public function create(Request $request)
    {
        return view(
            'pages.categoria.create-update',
            [
                'method' => 'POST',
                'action' => route('admin.categorias.store')
            ]
        );
    }

    public function store(StoreCategoryRequest $request)
    {
        // dd($request->all());
        try {
            $category = new Category();

            $category->fill($request->all());
            $category->tenant_id = auth()->user()->tenant_id;
            $category->save();

            return redirect(route('admin.categorias.index'))->with('success', 'Categoria criada com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors(
                $th,
                [
                    'message' => 'Erro ao criar categoria!',
                    'action' => route('admin.categorias.index')
                ]
            );
        }

    }

    public function edit(Request $request)
    {
        $category = Category::findOrFail($request->categoria);
        return view(
            'pages.categoria.create-update',
            [
                'method' => 'PUT',
                'action' => route('admin.categorias.update', $category->id),
                'category' => $category
            ]
        );
    }

    public function update(UpdateCategoryRequest $request)
    {
        $category = Category::findOrFail($request->categoria);

        try {
            $category->fill($request->all());
            $category->save();

            return redirect(route('admin.categorias.index'))->with('success', 'Categoria atualizada com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, ['message' => 'Erro ao criar categoria!', 'route' => route('admin.categorias.edit', $category->id)]);
        }
    }

    public function destroy(Request $request)
    {
        $category = Category::findOrFail($request->categoria);

        try {
            $category->delete();
            return redirect(route('admin.categorias.index'))->with('success', 'Categoria removida com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, ['message' => 'Erro ao remover categoria!', 'route' => route('admin.categorias.index', $category->id)]);
        }
    }
}
