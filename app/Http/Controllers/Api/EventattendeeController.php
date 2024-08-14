<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventAttendee;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventattendeeController extends Controller
{
    /**
     * Attend an event.
     */
    public function attend(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'event_id' => 'required|exists:events,id',
            ]);

            $user = $request->user();
            $user_id = $user->id;
            $event_id = $validatedData['event_id'];

            // Check if the user is already attending the event
            $existingAttendance = EventAttendee::where('user_id', $user_id)
                                               ->where('event_id', $event_id)
                                               ->first();

            if ($existingAttendance) {
                return response()->json([
                    'message' => 'User is already attending this event.',
                    'result' => false
                ], 409); // Conflict status code
            }

            // Create a new attendance entry
            $validatedData['user_id'] = $user_id;
            $attendance = EventAttendee::create($validatedData);

            return response()->json([
                'message' => 'Event attended successfully.',
                'result' => $attendance
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'result' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while attending the event.',
                'result' => false
            ], 500);
        }
    }

    /**
     * Unattend an event.
     */
    public function unattend(Request $request, $id)
    {
        try {
            $user = $request->user();
            $user_id = $user->id;

            // Find the attendance entry to delete
            $attendance = EventAttendee::where('user_id', $user_id)
                                       ->where('event_id', $id)
                                       ->first();

            if (!$attendance) {
                return response()->json([
                    'message' => 'Attendance entry not found.',
                    'result' => false
                ], 404); // Not found status code
            }

            // Delete the attendance entry
            $attendance->delete();

            return response()->json([
                'message' => 'Event unattended successfully.',
                'result' => true
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while unattending the event.',
                'result' => false
            ], 500);
        }
    }
}
