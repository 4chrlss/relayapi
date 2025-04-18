<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RelayGroup;
use App\Models\Relay;
use Illuminate\Http\Request;

class RelayGroupController extends Controller
 {
    
    public function create(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string',
            'relay_ids' => 'required|array',
        ]);

        $group = RelayGroup::create(['group_name' => $request->group_name]);
        $group->relay()->attach($request->relay_ids);

        return response()->json([
            'message' => 'Group created successfully.',
            'group' => $group
        ]);
    }

    
    public function toggle($id)
    {
        $group = RelayGroup::with('relays')->findOrFail($id);

        foreach ($group->relays as $relay) {
            $relay->relay_status = !$relay->relay_status;
            $relay->save();
        }

        return response()->json([
            'message' => 'Group toggled successfully.'
        ]);
    }

    

    public function list()
    {
        return RelayGroup::with('relay')->get();
    }
}

