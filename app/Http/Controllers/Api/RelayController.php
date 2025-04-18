<?php

namespace App\Http\Controllers\Api;

use App\Models\Relay;
use App\Http\Controllers\Controller;
use App\Http\Resources\RelayResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\RelayGroup;
    
class RelayController extends Controller
{
    public function index()
    {
        $relay = Relay::get();
        if($relay-> count() > 0)
        {
            return RelayResources::collection($relay);
        }
        else
        {
            return response()->json(['message' => 'No record available'], 200);
        }

    }

    public function store(Request $request)
    {
        $validator= Validator::make($request->all(),[
            'relay' => 'required|string|max:255',
            'relay_status' => 'required',
            //'name' => 'required|string|max:255',
            //'description' => 'required',
            //'price' => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'message' => 'All fields are mandetory',
                'error' => $validator->messages(),
            ], 422);
        }

        $relay = Relay::create([
            'relay' => $request->relay,
            'relay_status' => $request->relay_status,
            //'name' => $request->name,
            //'description' => $request->desciption,
            //'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Relay Created Successfully',
            'data' => new RelayResources ($relay)
        ],200);
    }

    public function show(Relay $relay)
    {
        return new RelayResources($relay);
    }

    public function update(Request $request, Relay $relay)
    {
        $validator= Validator::make($request->all(),[
            'relay' => 'required|string|max:255',
            'relay_status' => 'required',
            //'name' => 'required|string|max:255',
            //'description' => 'required',
            //'price' => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'message' => 'All fields are mandetory',
                'error' => $validator->messages(),
            ], 422);
        }

        $relay -> update([
            'relay' => $request->relay,
            'relay_status' => $request->relay_status,
            //'name' => $request->name,
            //'description' => $request->desciption,
            //'price' => $request->price,
        ]);

        return response()->json([
            'message' => 'Relay Updated Successfully',
            'data' => new RelayResources ($relay)
        ],200);
    }

    public function destroy(Relay $relay)
    {
        $relay -> delete();
        return response()->json([
            'message' => 'Relay Deleted Successfully',
        ],200);
    }


    public function toggleRelay($id)
    {
         $relay = Relay::find($id);

         if (!$relay) {
             return response()->json(['message' => 'Relay not found'], 404);
         }

       // Toggle logic
        $relay->relay_status = $relay->relay_status == 1 ? 0 : 1;
        $relay->save();

         return response()->json([
            'message' => 'Relay status updated',
            'relay_status' => $relay->relay_status, 
         ]);
     }


    // public function withtoggleRelayTimer($id, Request $request)
    // {
    //     //put time logic here
    //     toggleRelay($id);

    // }

    public function withtoggleRelayTimer($id, Request $request)
    {
        // Validate request to include a delay parameter
        $validatedData = $request->validate([
            'delay' => 'required|integer|min:1',
        ]);

        // Find the relay by ID
        $relay = Relay::find($id);

        if (!$relay) {
            return response()->json([
                'message' => "Record Not Found.",
            ], 404, [], JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT helps debugging
        }

        // Simulate delay
        sleep($validatedData['delay']);

        // Toggle relay status
        $relay->relay_status = $relay->relay_status == 1 ? 0 : 1;
        $relay->save();

        // Return proper JSON response
        return response()->json([
            'message' => "Relay toggled successfully after {$validatedData['delay']} seconds.",
            'id' => $relay->id,
            'new_status' => $relay->relay_status,
        ], 200, [], JSON_PRETTY_PRINT); // Ensures proper JSON format
    }

    

}