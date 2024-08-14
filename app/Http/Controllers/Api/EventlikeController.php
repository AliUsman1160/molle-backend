<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventLike;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventlikeController extends Controller
{
    /**
     * Like or unlike an event based on the request parameter.
     */
    public function like(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'event_id' => 'required|exists:events,id',
                'like' => 'required|boolean',
            ]);

            $user = $request->user();
            $user_id = $user->id;
            $event_id = $validatedData['event_id'];

            // Check if the like relationship already exists
            $existingLike = EventLike::where('user_id', $user_id)
                                      ->where('event_id', $event_id)
                                      ->first();

            if ($validatedData['like']) {
                // Like the event
                if ($existingLike) {
                    return response()->json([
                        'message' => 'You already liked this event.',
                        'result' => false
                    ], 409); // Conflict status code
                }

                // Create a new like relationship
                $validatedData['user_id'] = $user_id;
                $like = EventLike::create($validatedData);

                return response()->json([
                    'message' => 'Event liked successfully.',
                    'result' => $like
                ], 201);
            } else {
                // Unlike the event
                if (!$existingLike) {
                    return response()->json([
                        'message' => 'Like relationship not found.',
                        'result' => false
                    ], 404); // Not found status code
                }

                // Delete the like relationship
                $existingLike->delete();

                return response()->json([
                    'message' => 'Event unliked successfully.',
                    'result' => true
                ], 200);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error.',
                'result' => false,
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred while processing the request.',
                'result' => false
            ], 500);
        }
    }
}
