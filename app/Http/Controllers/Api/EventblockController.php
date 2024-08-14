<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventBlocklist;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventblockController extends Controller
{
    /**
     * Block or unblock an event based on the request parameter.
     */
    public function block(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'blocked_event_id' => 'required|exists:events,id',
                'block' => 'required|boolean',
            ]);

            $user = $request->user();
            $user_id = $user->id;
            $blocked_event_id = $validatedData['blocked_event_id'];

            // Check if the block relationship already exists
            $existingBlock = EventBlocklist::where('user_id', $user_id)
                                           ->where('blocked_event_id', $blocked_event_id)
                                           ->first();

            if ($validatedData['block']) {
                // Block the event
                if ($existingBlock) {
                    return response()->json([
                        'message' => 'Event is already blocked.',
                        'result' => false
                    ], 409); // Conflict status code
                }

                // Create a new block entry
                $validatedData['user_id'] = $user_id;
                $block = EventBlocklist::create($validatedData);

                return response()->json([
                    'message' => 'Event blocked successfully.',
                    'result' => $block
                ], 201);
            } else {
                // Unblock the event
                if (!$existingBlock) {
                    return response()->json([
                        'message' => 'Block entry not found.',
                        'result' => false
                    ], 404); // Not found status code
                }

                // Delete the block entry
                $existingBlock->delete();

                return response()->json([
                    'message' => 'Event unblocked successfully.',
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
