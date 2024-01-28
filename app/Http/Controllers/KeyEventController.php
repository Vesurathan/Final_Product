<?php

namespace App\Http\Controllers;

use App\Models\KeyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeyEventController extends Controller
{
    public function trackKeyEvent(Request $request)
    {
        $data = json_encode($request->input('data'));

        // Store the event data in your database
        DB::table('key_events')->insert([
            'type' => $request->input('type'),
            'data' => $data,
            'user_id' => $request->input('user_id'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Key event tracked successfully']);
    }
}
