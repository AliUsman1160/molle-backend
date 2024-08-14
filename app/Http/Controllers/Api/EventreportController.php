<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventReport;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventreportController extends Controller
{
    /**
     * Report an event.
     */
    public function report(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'reported_event_id' => 'required|exists:events,id',
            ]);
    
            $user = $request->user();
            $user_id = $user->id;
            $reported_event_id = $validatedData['reported_event_id'];
    
            // Check if the user has already reported this event
            $existingReport = EventReport::where('user_id', $user_id)
                                         ->where('reported_event_id', $reported_event_id)
                                         ->first();
    
            if ($existingReport) {
                return response()->json([
                    'message' => 'Event has already been reported by this user.',
                    'result' => false
                ], 409); // Conflict status code
            }
    
            // Create a new report entry
            $validatedData['user_id'] = $user_id;
            $report = EventReport::create($validatedData);
    
            return response()->json([
                'message' => 'Event reported successfully.',
                'result' => $report
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'result' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while reporting the event.',
                'result' => false,
                'error' => $e->getMessage() // Include error message for debugging
            ], 500);
        }
    }
    
}
