<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'User data retrieved successfully',
            'user' => $request->user(),
        ]);
    }
}
