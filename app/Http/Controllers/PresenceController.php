<?php

namespace App\Http\Controllers;

use App\Models\Presence;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PresenceController extends Controller
{
    public function index()
    {
        $presences = Presence::all();

        return response()->json([
            'presences' => $presences,
        ]);
    }

    public function indexByActivity($activity_id)
    {
        $presences = Presence::where('activity_id', $activity_id)->get();

        return response()->json([
            'presences' => $presences,
        ]);
    }

    public function show(Presence $presence)
    {
        return response()->json([
            'presence' => $presence,
        ]);
    }

    public function store(Request $request)
    {
        $presence = Presence::create($request->all());

        return response()->json([
            'presence' => $presence,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Presence $presence)
    {
        $presence->update($request->all());

        return response()->json([
            'presence' => $presence,
        ]);
    }

    public function destroy(Presence $presence)
    {
        $presence->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
