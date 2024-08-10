<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Profiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'bio' => 'required',
            'age' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $current_user = auth()->user();

        $profile = Profiles::updateOrCreate(
            ['user_id' => $current_user->id],
            [
                'bio' => $request['bio'],
                'age' => $request['age'],
                'user_id' => $current_user->id
            ]
        );

        return response()->json($profile);
    }
    // public function index()
    // {
    //     $current_user = auth()->user();

    //     $profile = Profiles::with('user')->where('user_id', $current_user->id)->first();

    //     return response()->json([
    //         'message' => 'Profile retrieved successfully.',
    //         'success' => true,
    //         'data' => $profile
    //     ]);
    // }
}
