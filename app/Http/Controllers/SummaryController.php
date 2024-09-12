<?php

namespace App\Http\Controllers;

use App\Http\Resources\TaskSummaryResource;
use Illuminate\Http\Request;

class SummaryController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // method from User.php 
        $tasks = $request->user()->tasksSummary($request->period);

        return $tasks->mapToGroups(function ($item, $key) {
            return [
                ($item->is_completed ? 'completed' : 'uncompleted') => TaskSummaryResource::make($item)
            ];
        });
    }
}