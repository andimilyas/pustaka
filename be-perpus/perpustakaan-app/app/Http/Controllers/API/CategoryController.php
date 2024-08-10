<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'isOwner'])->only(['store', 'update', 'destroy']);
    }

    public function index()
    {
        $category = Categories::all(); 

        return response()->json([
            'message' => 'success',
            'data' => $category
        ], 200);
    }

    public function store(CategoryRequest $request)
    {
        Categories::create($request->all());

        return response()->json(['message' => 'Category created'], 200);
    }

    public function show(string $id)
    {
        $category = Categories::with('listBook')->find($id); 
        
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return response()->json([
            'category' => $category
        ], 200);
    }

    public function update(Request $request, string $id)
    {
        $category = Categories::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->name = $request['name'];
        $category->save();

        return response()->json(['message' => 'Category updated'], 200);
    }

    public function destroy(string $id)
    {
        $category = Categories::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted'], 200);
    }
}
