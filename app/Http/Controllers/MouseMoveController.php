<?php

namespace App\Http\Controllers;

use App\Models\MouseMove;
use Illuminate\Http\Request;

class MouseMoveController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'x' => 'required|integer',
            'y' => 'required|integer',
            'user_id' => 'required|integer', // Ensure 'user_id' is present in the request

        ]);

        MouseMove::create($data);

        return response()->json(['message' => 'Mouse move data stored successfully']);
    }
}
