<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Borrows;

class BorrowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'isOwner'])->only(['index']);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'load_date' => 'required',
            'borrow_date' => 'required',
            'book_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $current_user = auth()->user();

        $borrow = Borrows::updateOrCreate( 
            [
                'load_date' => $request['load_date'],
                'borrow_date' => $request['borrow_date'],
                'book_id' => $request['book_id'],
                'user_id' => $current_user->id
            ]
        );

        return response()->json($borrow);
    }

    public function index()
    { 
        $borrows = Borrows::with('book')->get();
        return response()->json($borrows);
    }

}
