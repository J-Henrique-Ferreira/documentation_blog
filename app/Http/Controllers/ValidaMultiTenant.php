<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Permission;
use App\Models\Post;
use App\Models\Tenant;
use App\Models\User;

class ValidaMultiTenant extends Controller
{
    public function getAllUsers()
    {

        $users = []; // Placeholder for user retrieval logic
        $users = User::all(); // Retrieve all users from the database

        return $this->generateTable($users->toArray());
    }

    public function getAllPermissions()
    {
        $permissions = [];
        $permissions = Permission::all();

        // return $this->generateTable($permissions->toArray());

        $user = User::find(2)->with('permissions')->first(); // Retrieve the user with ID 1


        // retorno o conteúdo em json, copilot
        return response()->json([
            'user' => $user,
            'permissions' => $permissions
        ]);
    }

    public function getAllTenants()
    {
        $tenants = [];
        $tenants = Tenant::all();

        return $this->generateTable($tenants->toArray());
    }

    public function getCategory()
    {
        $category = [];
        $category = Category::all();
        return $this->generateTable($category->toArray());
    }

    public function getPosts()
    {
        $posts = [];
        $posts = Post::all();
        return $this->generateTable($posts->toArray());
    }


    public function generateTable($dataTable)
    {
        return view('debugTables', ['dataTable' => $dataTable]);
        // return view('welcome');

    }

}
