<?php

namespace App\Http\Controllers;

use App\Models\BlimpYeahSound;
use App\Models\Connection;
use Illuminate\Http\Request;

class BlimpYeahSoundsController extends Controller
{
    public function show()
    {
        Connection::create(['identifier' => 'test']);
        $isActive = BlimpYeahSound::where(['is_active' => true, 'id' => 1])->exists();
        return response()->json($isActive ? "active" : "not active", $isActive ? 200 : 503);
    }

    public function start()
    {
        BlimpYeahSound::updateOrCreate(['id' => 1], ['is_active' => true]);
        return redirect()->back();
    }

    public function stop()
    {
        BlimpYeahSound::updateOrCreate(['id' => 1], ['is_active' => false]);
        return redirect()->back();
    }
}
