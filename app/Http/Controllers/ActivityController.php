<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::orderBy(DB::raw("STR_TO_DATE(date, '%d/%m/%Y')"), 'desc')->get();

        return response()->json([
            'activities' => $activities,
            'dates' => $this->getUniqueDates($activities),
        ], Response::HTTP_OK);
    }

    public function show(Activity $activity)
    {
        return response()->json([
            'activities' => $activity,
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $activity = Activity::create($request->all());

        return response()->json([
            'activities' => $activity,
        ], Response::HTTP_CREATED);
    }

    public function update(Request $request, Activity $activity)
    {
        $activity->update($request->all());

        return response()->json([
            'activities' => $activity,
        ], Response::HTTP_OK);
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }

    private function getUniqueDates($activities)
    {
        $dates = [];
        foreach ($activities as $activity) {
            $dates[] = $activity->date;
        }
        // $dates = array_unique($dates);
        return array_values(array_unique($dates));
    }
}
