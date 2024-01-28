<?php

namespace App\Http\Controllers;

use App\Models\ButtonClick;
use Illuminate\Http\Request;

class ButtonClickController extends Controller
{
    public function trackButtonClick(Request $request)
    {
        $data =  $request->validate([
            'action' => 'required|string',
            'button_id' => 'required|string',
            'user_id' => 'required|integer',
        ]);
        ButtonClick::create($data);


        return response()->json(['message' => 'Button click tracked successfully']);
    }
}
