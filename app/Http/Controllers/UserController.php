<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usersList = User::orderBy('tenant_id')->with('tenant')->paginate(12);
        // dd($usersList);

        return view('pages.user.index', compact('usersList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tenantsList = Tenant::all();

        return view('pages.user.create-update', [
            'method' => 'POST',
            'action' => route('admin.usuarios.store'),
            'tenantsList' => $tenantsList
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tenant_id' => $request->tenant_id
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = User::with('tenant')->find($request->usuario);
        // dd($user);

        return view('pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
