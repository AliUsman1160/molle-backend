<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class FollowController extends Controller
{
    /**
     * Follow or unfollow a user based on the request parameter.
     */
    public function follow(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'followed_id' => 'required|exists:users,id',
                'follow' => 'required|boolean',
            ]);

            $user = $request->user();
            $follower_id = $user->id;
            $followed_id = $validatedData['followed_id'];

            // Check if the follower_id and followed_id are the same
            if ($follower_id === $followed_id) {
                return response()->json([
                    'message' => 'You cannot follow or unfollow yourself.',
                    'result' => false
                ], 400); // Bad request status code
            }

            // Check if the follow relationship already exists
            $existingFollow = Follower::where('follower_id', $follower_id)
                                      ->where('followed_id', $followed_id)
                                      ->first();

            if ($validatedData['follow']) {
                // Follow the user
                if ($existingFollow) {
                    return response()->json([
                        'message' => 'You are already following this user.',
                        'result' => false
                    ], 409); // Conflict status code
                }

                // Create a new follow relationship
                $validatedData['follower_id'] = $follower_id;
                $follow = Follower::create($validatedData);

                return response()->json([
                    'message' => 'User followed successfully.',
                    'result' => $follow
                ], 201);
            } else {
                // Unfollow the user
                if (!$existingFollow) {
                    return response()->json([
                        'message' => 'Follow relationship not found.',
                        'result' => false
                    ], 404); // Not found status code
                }

                // Delete the follow relationship
                $existingFollow->delete();

                return response()->json([
                    'message' => 'User unfollowed successfully.',
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
