<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\CategoryRequest;
use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'isOwner'])->only(['update', 'destroy', 'store']);
    }

    public function index()
    {
        $books = Books::with('category')->get();

        return response()->json([
            'message' => 'success',
            'data' => $books
        ], 200);
    }

    public function store(BookRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $path = env('APP_URL') . '/storage/images/';
            $data['image'] = $path . $imageName;
        }

        Books::create($data);

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    public function show(string $id)
    {
        $book = Books::with('category', 'listBorrow')->find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json([
            'message' => 'success',
            'data' => $book
        ], 200);
    }

    public function update(BookRequest $request, string $id)
    {
        $data = $request->validated();
        $book = Books::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        if ($request->hasFile('image')) {
            if ($book->image) {
                $imageName = basename($book->image);
                Storage::delete('public/images/' . $imageName);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images', $imageName);
            $path = env('APP_URL') . '/storage/images/';
            $data['image'] = $path . $imageName;
        }

        $book->update($data);

        return response()->json([
            'message' => 'success'
        ], 200);
    }

    public function destroy(string $id)
    {
        $book = Books::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        if ($book->image) {
            $imageName = basename($book->image);
            Storage::delete('public/images/' . $imageName);
        }
        
        $book->delete();

        return response()->json([
            'message' => 'success'
        ], 200);
    }
}
