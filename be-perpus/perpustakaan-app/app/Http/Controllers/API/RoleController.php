<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use App\Http\Requests\RoleRequest;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api','isOwner'])->only('index','store', 'update', 'delete');
    }

    public function index()
    {
        $roles = Roles::all();

        return response()->json([
            "message" => "Success",
            "data" => $roles
        ], 200);
    }

    public function store(RoleRequest $request)
    {
        Roles::create($request->all());

        return response()->json([
            "message" => "Successfully created"
        ],201);
    }
    public function update(RoleRequest $request, string $id)
    {
        $roles = Roles::find($id);

        if (!$roles) {
            response()->json([
                "message" => ""
            ], 404);
        }

        $roles->name = $request['name'];

        $roles->save();

        return response()->json([
            "message" => "Successfully updated"
        ], 201);
    }

    public function destroy(string $id)
    {
        $roles = Roles::find($id);

        if (!$roles) {
            response()->json([
                "message" => "Not found"
            ], 404);
        }

        $roles->delete();

        return response()->json([
            "message" => "Successfully deleted"
        ], 201);
    }
}
