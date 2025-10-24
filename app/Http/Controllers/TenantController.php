<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Traits\ReturnErrors;
use App\Traits\ParseMdToHtml;

class TenantController extends Controller
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
            // $categoriesList = Category::where('tenant_id', $tenantId)->get();
            $tenantsList = Tenant::orderBy('name', 'asc')->paginate(12);

            return view(
                'pages.tenant.index',
                compact(
                    'tenantsList'
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
        return view(
            'pages.tenant.create-update',
            [
                'method' => 'POST',
                'action' => route('admin.clientes.store'),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        // dd($request->all());
        try {
            $tenant = new Tenant($request->all());
            $tenant->save();

            return redirect(route('admin.clientes.index'))->with('success', 'Cliente criado com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, [
                'message' => 'Erro ao criar documento.',
                'route' => route('admin.clientes.index')
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $tenant = Tenant::findOrFail($request->cliente);
        $tenant->content = $this->parseMdToHtml($tenant->content);
        // dd($tenant);

        return view('pages.tenant.show', compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $tenant = Tenant::findOrFail($request->cliente);
        return view('pages.tenant.create-update', [
            'tenant' => $tenant,
            'method' => 'PUT',
            'action' => route('admin.clientes.update', $tenant->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantRequest $request)
    {
        // dd('entrou no metodo');
        try {
            $tenant = Tenant::findOrFail($request->cliente);
            $tenant->fill($request->all());
            $tenant->save();

            return redirect(route('admin.clientes.index'))->with('success', 'Cliente alterado com sucesso!');
        } catch (\Throwable $th) {
            return $this->returnErrors($th, [
                'message' => 'Erro ao alterar cliente.',
                'route' => route('admin.clientes.index')
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
