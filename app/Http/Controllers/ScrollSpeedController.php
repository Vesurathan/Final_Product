<?php

namespace App\Http\Controllers;

use App\Models\ScrollSpeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScrollSpeedController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'scroll_speed' => 'required|numeric',
            'user_id' => 'required|integer',
        ]);


        // Create a new scroll speed entry
        ScrollSpeed::create($data);

        return response()->json(['message' => 'Scroll speed data stored successfully']);
    }
}
